
<script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            dropdown = body.querySelector(".dropdown"),
            dropdownmenu = body.querySelector(".dropdetail");
        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("sidebarclose");
        })
        dropdown.addEventListener("click", () => {
            dropdownmenu.classList.toggle("dropdownopen");
        })
    </script>