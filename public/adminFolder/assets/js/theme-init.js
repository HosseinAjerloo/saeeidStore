(function () {
  try {
    if (localStorage.getItem("huma-admin-theme") === "light") {
      document.documentElement.classList.remove("dark");
      document.documentElement.classList.add("theme-light");
      document.documentElement.style.colorScheme = "light";
    }
  } catch (_) {
    /* تم پیش‌فرض تیره باقی می‌ماند. */
  }
})();
