/* ===================================
   زمانک - JavaScript اصلی
   =================================== */

// === افزودن به سبد خرید ===
async function addToCart(productId, productName) {
  // به‌روزرسانی شمارنده سبد خرید
  const cartBadge = document.querySelector('#cart-count');
  if (cartBadge) {
    let count = parseInt(cartBadge.textContent) || 0;
    count++;
    cartBadge.textContent = count;
    cartBadge.style.display = 'flex';
  }
  syncBottomCartBadge();
  showToast(productName + ' به سبد خرید اضافه شد', 'success');
}

async function sendRequestAddToCart  () {

}

// === افزودن به علاقه‌مندی ===
function toggleFavorite(btn) {
  const icon = btn.querySelector('i');
  if (icon.classList.contains('bi-heart')) {
    icon.classList.remove('bi-heart');
    icon.classList.add('bi-heart-fill');
    btn.classList.add('active');
    showToast('به لیست علاقه‌مندی‌ها اضافه شد', 'success');

    const favBadge = document.querySelector('#fav-count');
    if (favBadge) {
      let count = parseInt(favBadge.textContent) || 0;
      count++;
      favBadge.textContent = count;
      favBadge.style.display = 'flex';
    }
  } else {
    icon.classList.remove('bi-heart-fill');
    icon.classList.add('bi-heart');
    btn.classList.remove('active');
    showToast('از لیست علاقه‌مندی‌ها حذف شد', 'info');
  }
}

// === نمایش Toast ===
function showToast(message, type = 'success') {
  let toast = document.querySelector('.custom-toast');
  if (!toast) {
    toast = document.createElement('div');
    toast.className = 'custom-toast';
    document.body.appendChild(toast);
  }

  const iconMap = {
    success: 'bi-check-circle-fill',
    info: 'bi-info-circle-fill',
    error: 'bi-x-circle-fill',
    warning: 'bi-exclamation-triangle-fill'
  };

  const colorMap = {
    success: 'var(--color-success)',
    info: 'var(--color-primary)',
    error: 'var(--color-danger)',
    warning: 'var(--color-warning)'
  };

  toast.innerHTML = '<i class="bi ' + (iconMap[type] || iconMap.success) + '" style="color:' + (colorMap[type] || colorMap.success) + '"></i><span>' + message + '</span>';
  toast.style.borderRightColor = colorMap[type] || colorMap.success;

  setTimeout(() => toast.classList.add('show'), 50);
  setTimeout(() => toast.classList.remove('show'), 3000);
}

// === گالری محصول ===
function changeMainImage(src, thumb) {
  const mainImg = document.querySelector('#main-product-image');
  if (mainImg) {
    mainImg.style.opacity = '0';
    setTimeout(() => {
      mainImg.src = src;
      mainImg.style.opacity = '1';
    }, 150);
  }
  document.querySelectorAll('.product-gallery-thumbs .thumb').forEach(t => t.classList.remove('active'));
  thumb.classList.add('active');
}

// === انتخاب رنگ ===
function selectColor(swatch) {
  document.querySelectorAll('.color-swatch').forEach(s => s.classList.remove('selected'));
  swatch.classList.add('selected');
}

// === انتخاب تب موبایل ===
function showMobileTab(tabId, btn) {
  document.querySelectorAll('.mobile-tabs .nav-link').forEach(t => t.classList.remove('active'));
  if (btn) btn.classList.add('active');
  document.querySelectorAll('.mobile-tab-content').forEach(c => {
    c.classList.remove('show', 'active');
    c.classList.add('d-none');
  });
  const target = document.getElementById(tabId);
  if (target) {
    target.classList.remove('d-none');
    target.classList.add('show', 'active');
  }
}

// === تب‌های صفحه جستجو (موبایل) ===
function showSearchMobileTab(tab, btn) {
  document.querySelectorAll('.mobile-tabs .nav-link').forEach(t => t.classList.remove('active'));
  if (btn) btn.classList.add('active');

  const productsPanel = document.getElementById('search-grid');
  const brandsPanel = document.getElementById('search-brands');

  if (tab === 'filter') {
    const sidebar = document.getElementById('filterSidebar');
    if (sidebar && typeof bootstrap !== 'undefined') {
      bootstrap.Offcanvas.getOrCreateInstance(sidebar).show();
    }
    return;
  }

  if (productsPanel) productsPanel.classList.toggle('d-none', tab === 'brands');
  if (brandsPanel) brandsPanel.classList.toggle('d-none', tab !== 'brands');

  if (tab === 'grid') setProductsView('grid');
  if (tab === 'list') setProductsView('list');
}

// === تغییر حالت نمایش محصولات (گرید / لیست) ===
function setProductsView(mode) {
  const container = document.getElementById('products-container');
  if (!container) return;

  const isList = mode === 'list';
  container.classList.toggle('products-list-view', isList);

  document.querySelectorAll('.view-toggle-btn').forEach(btn => {
    const active = btn.dataset.view === mode;
    btn.classList.toggle('active', active);
    btn.classList.toggle('btn-primary-custom', active);
    btn.classList.toggle('btn-outline-primary-custom', !active);
  });

  // همگام‌سازی تب موبایل با حالت نمایش
  const mobileTabs = document.querySelectorAll('.mobile-tabs .nav-link[data-search-tab]');
  if (mobileTabs.length) {
    const brandsPanel = document.getElementById('search-brands');
    const brandsVisible = brandsPanel && !brandsPanel.classList.contains('d-none');
    if (!brandsVisible) {
      mobileTabs.forEach(tab => {
        const match = tab.dataset.searchTab === mode;
        tab.classList.toggle('active', match);
      });
    }
  }
}

// === تغییر تعداد در سبد خرید ===
function changeQuantity(input, delta) {
  let value = parseInt(input.value) || 1;
  value += delta;
  if (value < 1) value = 1;
  input.value = value;
  updateCartTotal();
}

// === به‌روزرسانی جمع کل سبد ===
function updateCartTotal() {
  let total = 0;
  document.querySelectorAll('.cart-item').forEach(item => {
    const priceEl = item.querySelector('.item-price');
    const qtyInput = item.querySelector('.cart-quantity input');
    if (priceEl && qtyInput) {
      const price = parseInt(priceEl.dataset.price) || 0;
      const qty = parseInt(qtyInput.value) || 1;
      total += price * qty;
    }
  });

  const totalEl = document.querySelector('#cart-total');
  if (totalEl) totalEl.textContent = total.toLocaleString('fa-IR') + ' تومان';

  const totalItemsEl = document.querySelector('#cart-items-count');
  if (totalItemsEl) {
    let count = 0;
    document.querySelectorAll('.cart-item .cart-quantity input').forEach(i => {
      count += parseInt(i.value) || 1;
    });
    totalItemsEl.textContent = count.toLocaleString('fa-IR');
  }
}

// === حذف آیتم سبد ===
function removeCartItem(btn) {
  const item = btn.closest('.cart-item');
  if (item) {
    item.style.opacity = '0';
    item.style.transform = 'translateX(-100%)';
    setTimeout(() => {
      item.remove();
      updateCartTotal();
      showToast('محصول از سبد حذف شد', 'info');
    }, 300);
  }
}

// === FAQ آکاردئون ===
function toggleFaq(header) {
  const item = header.parentElement;
  item.classList.toggle('open');
}

// === اسلایدر لوگو برندها ===
function initBrandCarousel() {
  // توسط bootstrap carousel مدیریت می‌شود
}

// === تایمر شگفت‌انگیز ===
function startCountdown() {
  const timer = document.querySelector('#amazing-timer');
  if (!timer) return;

  let hours = parseInt(timer.dataset.hours) || 8;
  let minutes = parseInt(timer.dataset.minutes) || 0;
  let seconds = parseInt(timer.dataset.seconds) || 0;

  const interval = setInterval(() => {
    if (seconds > 0) {
      seconds--;
    } else if (minutes > 0) {
      minutes--;
      seconds = 59;
    } else if (hours > 0) {
      hours--;
      minutes = 59;
      seconds = 59;
    } else {
      clearInterval(interval);
      return;
    }

    const hEl = document.querySelector('#timer-hours');
    const mEl = document.querySelector('#timer-minutes');
    const sEl = document.querySelector('#timer-seconds');
    if (hEl) hEl.textContent = String(hours).padStart(2, '0');
    if (mEl) mEl.textContent = String(minutes).padStart(2, '0');
    if (sEl) sEl.textContent = String(seconds).padStart(2, '0');
  }, 1000);
}

// === OTP ورود ===
function setupOtpInputs() {
  const inputs = document.querySelectorAll('.otp-input');
  inputs.forEach((input, index) => {
    input.addEventListener('input', () => {
      if (input.value.length === 1 && index < inputs.length - 1) {
        inputs[index + 1].focus();
      }
    });
    input.addEventListener('keydown', (e) => {
      if (e.key === 'Backspace' && input.value === '' && index > 0) {
        inputs[index - 1].focus();
      }
    });
  });
}

// === ستاره‌گذاری نظر ===
function setupStarRating() {
  const stars = document.querySelectorAll('.star-rating input');
  stars.forEach(star => {
    star.addEventListener('change', () => {
      const rating = star.value;
      const display = document.querySelector('#rating-display');
      if (display) display.textContent = rating + ' از 5';
    });
  });
}

// === انتخاب آدرس ===
function selectAddress(card) {
  document.querySelectorAll('.address-card').forEach(c => c.classList.remove('selected'));
  card.classList.add('selected');
  card.style.borderColor = 'var(--color-primary)';
  document.querySelectorAll('.address-card').forEach(c => {
    if (c !== card) c.style.borderColor = 'var(--color-border)';
  });
}

// === اعتبارسنجی فرم ===
function validateForm(formId) {
  const form = document.getElementById(formId);
  if (!form) return true;

  let valid = true;
  form.querySelectorAll('[required]').forEach(field => {
    if (!field.value.trim()) {
      field.style.borderColor = 'var(--color-danger)';
      valid = false;
    } else {
      field.style.borderColor = 'var(--color-border)';
    }
  });

  if (!valid) {
    showToast('لطفاً تمام فیلدهای الزامی را پر کنید', 'error');
  }

  return valid;
}

// === مگا منو موبایل ===
function toggleMobileMenu() {
  const menu = document.querySelector('#mobile-menu');
  if (!menu) return;

  const isOpen = menu.classList.toggle('show');
  document.body.classList.toggle('menu-open', isOpen);
  menu.setAttribute('aria-hidden', isOpen ? 'false' : 'true');

  const catBtn = document.querySelector('.bottom-nav-item[data-nav="categories"]');
  if (catBtn) {
    catBtn.classList.toggle('active', isOpen);
    const icon = catBtn.querySelector('i');
    if (icon) icon.className = isOpen ? 'bi bi-grid-fill' : 'bi bi-grid';
  }
}

function toggleMobileSubmenu(btn) {
  const group = btn.closest('.mobile-menu-group');
  if (!group) return;

  const wasOpen = group.classList.contains('open');
  document.querySelectorAll('.mobile-menu-group.open').forEach(function (el) {
    el.classList.remove('open');
  });
  if (!wasOpen) {
    group.classList.add('open');
  }
}

document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape') {
    const menu = document.querySelector('#mobile-menu.show');
    if (menu) toggleMobileMenu();
  }
});

// === مسیرهای نسبی سایت ===
function getSitePaths() {
  const css = document.querySelector('link[href*="styles.css"]');
  const nested = !!(css && css.getAttribute('href').startsWith('../'));
  if (nested) {
    return {
      nested: true,
      home: '../index.html',
      search: 'search.html',
      cart: 'cart.html',
      profile: 'profile.html',
      amazing: 'amazing.html',
      compare: 'compare.html',
      blog: 'blog.html',
      faq: 'faq.html',
      login: 'auth-login.html'
    };
  }
  return {
    nested: false,
    home: 'index.html',
    search: 'pages/search.html',
    cart: 'pages/cart.html',
    profile: 'pages/profile.html',
    amazing: 'pages/amazing.html',
    compare: 'pages/compare.html',
    blog: 'pages/blog.html',
    faq: 'pages/faq.html',
    login: 'pages/auth-login.html'
  };
}

function ensureMobileMenu() {
  if (document.getElementById('mobile-menu')) return;

  const p = getSitePaths();
  const menu = document.createElement('div');
  menu.id = 'mobile-menu';
  menu.className = 'mobile-menu d-lg-none';
  menu.setAttribute('aria-hidden', 'true');
  menu.innerHTML =
    '<div class="mobile-menu-overlay" onclick="toggleMobileMenu()"></div>' +
    '<div class="mobile-menu-panel" role="dialog" aria-label="منوی اصلی">' +
      '<div class="mobile-menu-header">' +
        '<a href="' + p.home + '" class="header-logo"><i class="bi bi-clock-history"></i> زمانک</a>' +
        '<button type="button" class="mobile-menu-close" onclick="toggleMobileMenu()" aria-label="بستن منو"><i class="bi bi-x-lg"></i></button>' +
      '</div>' +
      '<nav class="mobile-menu-nav">' +
        '<a href="' + p.home + '" class="mobile-menu-link"><i class="bi bi-house"></i> خانه</a>' +
        '<div class="mobile-menu-group">' +
          '<button type="button" class="mobile-menu-link mobile-menu-toggle" onclick="toggleMobileSubmenu(this)"><span><i class="bi bi-smartwatch"></i> ساعت مردانه</span><i class="bi bi-chevron-down"></i></button>' +
          '<div class="mobile-submenu">' +
            '<a href="' + p.search + '">کاسیو</a><a href="' + p.search + '">سیتیزن</a><a href="' + p.search + '">سیکو</a><a href="' + p.search + '">اورینت</a><a href="' + p.search + '">تیسوت</a>' +
          '</div>' +
        '</div>' +
        '<div class="mobile-menu-group">' +
          '<button type="button" class="mobile-menu-link mobile-menu-toggle" onclick="toggleMobileSubmenu(this)"><span><i class="bi bi-heart"></i> ساعت زنانه</span><i class="bi bi-chevron-down"></i></button>' +
          '<div class="mobile-submenu">' +
            '<a href="' + p.search + '">مایکل کورس</a><a href="' + p.search + '">فسیل</a><a href="' + p.search + '">اسکاگن</a><a href="' + p.search + '">دنیل ولینگتون</a>' +
          '</div>' +
        '</div>' +
        '<div class="mobile-menu-group">' +
          '<button type="button" class="mobile-menu-link mobile-menu-toggle" onclick="toggleMobileSubmenu(this)"><span><i class="bi bi-grid"></i> همه برندها</span><i class="bi bi-chevron-down"></i></button>' +
          '<div class="mobile-submenu">' +
            '<a href="' + p.search + '">Apple</a><a href="' + p.search + '">Casio</a><a href="' + p.search + '">Seiko</a><a href="' + p.search + '">Rolex</a><a href="' + p.search + '">Tissot</a>' +
          '</div>' +
        '</div>' +
        '<div class="mobile-menu-group">' +
          '<button type="button" class="mobile-menu-link mobile-menu-toggle" onclick="toggleMobileSubmenu(this)"><span><i class="bi bi-smartwatch"></i> ساعت هوشمند</span><i class="bi bi-chevron-down"></i></button>' +
          '<div class="mobile-submenu">' +
            '<a href="' + p.search + '">اپل واچ</a><a href="' + p.search + '">سامسونگ</a><a href="' + p.search + '">هواوی</a><a href="' + p.search + '">شیائومی</a>' +
          '</div>' +
        '</div>' +
        '<a href="' + p.amazing + '" class="mobile-menu-link"><i class="bi bi-fire"></i> شگفت‌انگیزها</a>' +
        '<a href="' + p.compare + '" class="mobile-menu-link"><i class="bi bi-bar-chart"></i> مقایسه</a>' +
        '<a href="' + p.blog + '" class="mobile-menu-link"><i class="bi bi-journal"></i> مجله زمانک</a>' +
        '<a href="' + p.faq + '" class="mobile-menu-link"><i class="bi bi-question-circle"></i> پرسش‌های متداول</a>' +
        '<a href="' + p.login + '" class="mobile-menu-link"><i class="bi bi-person"></i> ورود / ثبت‌نام</a>' +
      '</nav>' +
    '</div>';
  document.body.appendChild(menu);
}

function getBottomNavActiveKey() {
  const path = (location.pathname || '').toLowerCase();
  const file = path.split('/').pop() || '';

  if (!file || file === 'index.html' || path.endsWith('/zamank/') || path.endsWith('/zamank')) return 'home';
  if (file === 'cart.html' || file.indexOf('checkout') === 0) return 'cart';
  if (file === 'search.html' || file.indexOf('product') === 0 || file === 'amazing.html' || file === 'compare.html') return 'products';
  if (file.indexOf('profile') === 0 || file.indexOf('auth-') === 0) return 'profile';
  return '';
}

function initBottomNav() {
  if (document.getElementById('bottom-nav')) return;

  ensureMobileMenu();

  const p = getSitePaths();
  const active = getBottomNavActiveKey();
  const nav = document.createElement('nav');
  nav.id = 'bottom-nav';
  nav.className = 'bottom-nav d-lg-none';
  nav.setAttribute('aria-label', 'دسترسی سریع');

  nav.innerHTML =
    '<div class="bottom-nav-inner">' +
      '<a href="' + p.home + '" class="bottom-nav-item' + (active === 'home' ? ' active' : '') + '" data-nav="home">' +
        '<i class="bi ' + (active === 'home' ? 'bi-house-fill' : 'bi-house') + '"></i><span>خانه</span>' +
      '</a>' +
      '<button type="button" class="bottom-nav-item" data-nav="categories" onclick="toggleMobileMenu()">' +
        '<i class="bi bi-grid"></i><span>دسته‌ها</span>' +
      '</button>' +
      '<a href="' + p.search + '" class="bottom-nav-item' + (active === 'products' ? ' active' : '') + '" data-nav="products">' +
        '<i class="bi ' + (active === 'products' ? 'bi-shop-window' : 'bi-shop') + '"></i><span>محصولات</span>' +
      '</a>' +
      '<a href="' + p.cart + '" class="bottom-nav-item' + (active === 'cart' ? ' active' : '') + '" data-nav="cart">' +
        '<i class="bi ' + (active === 'cart' ? 'bi-cart-fill' : 'bi-cart') + '"></i><span>سبد</span>' +
        '<span class="bottom-nav-badge" id="bottom-cart-badge">0</span>' +
      '</a>' +
      '<a href="' + p.profile + '" class="bottom-nav-item' + (active === 'profile' ? ' active' : '') + '" data-nav="profile">' +
        '<i class="bi ' + (active === 'profile' ? 'bi-person-fill' : 'bi-person') + '"></i><span>پروفایل</span>' +
      '</a>' +
    '</div>';

  document.body.appendChild(nav);
  syncBottomCartBadge();
}

function syncBottomCartBadge() {
  const badge = document.getElementById('bottom-cart-badge');
  if (!badge) return;
  const headerBadge = document.getElementById('cart-count');
  let count = 0;
  if (headerBadge) {
    count = parseInt(headerBadge.textContent, 10) || 0;
    if (headerBadge.style.display === 'none') count = 0;
  }
  if (!count) {
    const visible = document.querySelector('.header-icon .badge-count[style*="flex"]');
    if (visible && visible.closest('a[href*="cart"]')) {
      count = parseInt(visible.textContent, 10) || 0;
    }
  }
  if (count > 0) {
    badge.textContent = count;
    badge.style.display = 'flex';
  } else {
    badge.style.display = 'none';
  }
}

// === جستجوی زنده ===
function liveSearch(input) {
  const query = input.value.trim().toLowerCase();
  const results = document.querySelector('#search-suggestions');
  if (!results) return;

  if (query.length < 2) {
    results.classList.add('d-none');
    return;
  }

  // شبیه‌سازی نتایج
  const mockResults = [
    'ساعت مچی کاسیو',
    'ساعت هوشمند اپل',
    'ساعت دیجیتال مردانه',
    'ساعت آنالوگ زنانه'
  ];

  const filtered = mockResults.filter(r => r.includes(query));
  if (filtered.length > 0) {
    results.innerHTML = filtered.map(r =>
      '<div class="search-suggestion-item" onclick="selectSuggestion(this)"><i class="bi bi-search"></i> ' + r + '</div>'
    ).join('');
    results.classList.remove('d-none');
  } else {
    results.innerHTML = '<div class="search-suggestion-item text-muted">نتیجه‌ای یافت نشد</div>';
    results.classList.remove('d-none');
  }
}

function selectSuggestion(item) {
  const searchInput = document.querySelector('#search-input');
  if (searchInput) {
    searchInput.value = item.textContent.trim();
    document.querySelector('#search-suggestions').classList.add('d-none');
  }
}

// === بارگذاری صفحه ===
document.addEventListener('DOMContentLoaded', function() {
  // نوار دسترسی سریع موبایل/تبلت
  initBottomNav();

  // شروع تایمر شگفت‌انگیز
  startCountdown();

  // راه‌اندازی OTP
  setupOtpInputs();

  // راه‌اندازی ستاره‌گذاری
  setupStarRating();

  // بستن Toast با کلیک
  document.addEventListener('click', function(e) {
    if (e.target.classList.contains('custom-toast') || e.target.closest('.custom-toast')) {
      e.target.closest('.custom-toast')?.classList.remove('show');
    }
  });

  // بستن پیشنهادات جستجو با کلیک خارج
  document.addEventListener('click', function(e) {
    if (!e.target.closest('.search-bar')) {
      const results = document.querySelector('#search-suggestions');
      if (results) results.classList.add('d-none');
    }
  });

  // مدیریت فرم‌ها
  document.querySelectorAll('form[data-validate]').forEach(form => {
    form.addEventListener('submit', function(e) {
      if (!validateForm(form.id)) {
        e.preventDefault();
      }
    });
  });
});

// === تبدیل اعداد به فارسی ===
function toPersianNumber(num) {
  const persianDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
  return String(num).replace(/\d/g, d => persianDigits[d]);
}

// === فرمت قیمت ===
function formatPrice(price) {
  return Number(price).toLocaleString('fa-IR') + ' تومان';
}
