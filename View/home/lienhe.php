<div class="main_sp">
    <section class="container">
        <h2 class="mb-3">Vị trí</h2>
        <div class="row gy-4 align-items-start">
            <div class="col-lg-7">
                <div id="map" style="width:100%;height:420px;border-radius:8px;overflow:hidden;border:1px solid #e6e6e6"></div>
            </div>
            <div class="col-lg-5">
                <div class="p-4 mb-3 bg-white" style="border-radius:8px;border:1px solid #eee;min-height:420px;">
                    <h3 class="h5 text-black mb-3">Thông tin liên lạc</h3>
                    <p class="mb-0 fw-bold">Địa chỉ</p>
                    <p class="mb-4">Ngũ Hành Sơn, Thành phố Đà Nẵng</p>

                    <p class="mb-0 fw-bold">Phone</p>
                    <p class="mb-4"><a href="tel:+8423232320243">+84 232 323 20243</a></p>

                    <p class="mb-0 fw-bold">Email</p>
                    <p class="mb-0"><a href="mailto:youremail@gmail.com">youremail@gmail.com</a></p>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    // Initialize Google Map centered on Vũng Tàu (approx)
    function initMap() {
        var nghanhson = { lat: 15.8402, lng: 108.2936 };
        var mapEl = document.getElementById('map');
        if (!mapEl) return;
        var map = new google.maps.Map(mapEl, { zoom: 13, center: nghanhson });
        new google.maps.Marker({ position: nghanhson, map: map });
    }

    // If Google Maps API is loaded with callback=initMap it will run; otherwise try to init after load.
    if (typeof google !== 'undefined' && google.maps && typeof google.maps.Map === 'function') {
        initMap();
    }
</script>
