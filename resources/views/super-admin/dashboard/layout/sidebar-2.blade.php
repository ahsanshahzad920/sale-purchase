<div class="sidebar customer-sidebar pb-3 bg-white">
    <nav class="navbar navbar-light">
        <a href="{{ route('super.dashboard') }}" class="navbar-brand ms-3 d-flex justify-content-center w-100">
            <img style="width: 65px" src="{{ asset('back/assets/dasheets/img/profile-img.png') }}" alt="">
        </a>
        <div class="navbar-nav w-100 border-top pt-3">
            <a href="{{ route('super.dashboard') }}"
                class="nav-item nav-link @if (request()->routeIs('super.dashboard')) active @endif">
                <i class="bi bi-grid me-2"></i><span>Dashboard</span>
            </a>
            <hr class="mx-3" />

            <div class="ps-4">
                <h6 class="ps-2 fw-bold">Custom Domain</h6>
            </div>
            <a href="{{ route('custom-domain.requests') }}" class="nav-item nav-link ">
                <i class="bi bi-box-seam me-2"></i><span>Request</span>
            </a>
            <hr class="mx-3" />

            <div class="ps-4">
                <h6 class="ps-2 fw-bold">Pricing</h6>
            </div>
            <a href="{{ route('super.plans.index') }}" class="nav-item nav-link ">
                <i class="bi bi-box-seam me-2"></i><span>All Plan</span>
            </a>
            <a href="{{ route('super.plans.create') }}" class="nav-item nav-link ">
                <i class="bi bi-bag-plus me-2"></i><span>Create Plan</span>
            </a>
            <hr class="mx-3" />

            <div class="ps-4">
                <h6 class="ps-2 fw-bold">Customers</h6>
            </div>
            <a href="{{ route('super.customers.index') }}" class="nav-item nav-link ">
                <i class="bi bi-box-seam me-2"></i><span>All Customers</span>
            </a>
            <hr class="mx-3" />
            <div class="ps-4">
                <h6 class="ps-2 fw-bold">Coupons</h6>
            </div>
            <a href="{{ route('super.coupons.index') }}" class="nav-item nav-link ">
                <i class="bi bi-box-seam me-2"></i><span>Coupons</span>
            </a>
            <hr class="mx-3" />
            <div class="ps-4">
                <h6 class="ps-2 fw-bold">Subscriptions</h6>
            </div>
            <a href="{{ route('super.subscriptions.index') }}" class="nav-item nav-link ">
                <i class="bi bi-box-seam me-2"></i><span>All Subscriptions</span>
            </a>

            <hr class="mx-3" />
            <div class="ps-4">
                <h6 class="ps-2 fw-bold">Transactions</h6>
            </div>
            <a href="{{ route('super.transactions.index') }}" class="nav-item nav-link ">
                <i class="bi bi-box-seam me-2"></i><span>All Transactions</span>
            </a>
            <hr class="mx-3" />
            <div class="ps-4">
                <h6 class="ps-2 fw-bold">Contacts</h6>
            </div>
            <a href="{{ route('super.contact.index') }}" class="nav-item nav-link ">
                <i class="bi bi-box-seam me-2"></i><span>All Contacts</span>
            </a>
        </div>
    </nav>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Loop through all dropdowns
        document.querySelectorAll(".nav-item.dropdown").forEach(function(dropdown) {
            // Check if any child link inside this dropdown is active
            if (dropdown.querySelector(".dropdown-item.active")) {
                // Add Bootstrap's `show` class to keep it open
                dropdown.classList.add("show");
                dropdown.querySelector(".dropdown-menu").classList.add("show");
            }
        });
    });
</script>
