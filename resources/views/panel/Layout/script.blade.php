<!-- Bootstrap JS -->
<script src="{{ asset('global/js/bootstrap.bundle.min.js') }}"></script>
<!-- اسکریپت سفارشی -->
<script src="{{ asset('panelFolder/js/main.js') }}"></script>


<script>
    function toggleFavorite(btn, product) {

        favorite(product).then(result => {
            const favBadge = document.querySelector('#fav-count');
            let count = parseInt(favBadge.textContent) || 0;
            const icon = btn.querySelector('i');
            if (icon.classList.contains('bi-heart') && result.type == 'create') {
                icon.classList.remove('bi-heart');
                icon.classList.add('bi-heart-fill');
                btn.classList.add('active');
                showToast('به لیست علاقه‌مندی‌ها اضافه شد', 'success');

                if (favBadge) {

                    count++;
                    favBadge.textContent = count;
                    favBadge.style.display = 'flex';
                }
            } else {
                count--;
                favBadge.textContent = count;
                icon.classList.remove('bi-heart-fill');
                icon.classList.add('bi-heart');
                btn.classList.remove('active');
                showToast('از لیست علاقه‌مندی‌ها حذف شد', 'info');
            }
        })

    }

    async function favorite(productVariant) {

        const promise = new Promise(function(resolve, reject) {
            const request = new XMLHttpRequest();
            request.open('POST', "{{ route('panel.favorite.my-favorite') }}", true)
            request.setRequestHeader('Content-Type', 'application/json');
            request.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}")
            request.withCredentials = true;
            const body = JSON.stringify({
                productVariant
            })
            request.onload = function() {
                const response = JSON.parse(request.response);
                if (request.status === 200) {
                    resolve(response)
                } else {
                    reject(response)
                }
            }
            request.send(body);
        })
        return promise;
    }
</script>


    <script>
        async function addToCart(productId, productName) {
            const cartBadge = document.querySelector('#cart-count');
            if (cartBadge) {
                let count = parseInt(cartBadge.textContent) || 0;

                sendAddToCartRequest({
                    productVariant: productId
                }).then(result => {
                    count++;
                    cartBadge.textContent = count;
                    cartBadge.style.display = 'flex';
                    syncBottomCartBadge();
                    showToast(result?.message, 'success');
                }).catch(result => {
                    showToast(result?.message, 'error');

                })
            }

        }
        async function sendAddToCartRequest({
            productVariant
        }) {
            const promise = new Promise(function(resolve, reject) {
                const request = new XMLHttpRequest();
                request.open('POST', "{{ route('panel.cart.addCart') }}", true)
                request.setRequestHeader('Content-Type', 'application/json');
                request.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}")
                request.withCredentials = true;
                const body = JSON.stringify({
                    productVariant
                })
                request.onload = function() {
                    const response = JSON.parse(request.response);
                    if (request.status === 200) {
                        resolve(response)
                    } else {
                        reject(response)
                    }
                }
                request.send(body);
            })
            return promise;
        }
    </script>
