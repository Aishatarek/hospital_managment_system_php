
<script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box");
        const dropdown = document.querySelectorAll(".dropdown");
        const dropdownmenu = document.querySelectorAll(".dropdetail")
        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("sidebarclose");
        })
        for (let index = 0; index < dropdown.length; index++) {
            dropdown[index].addEventListener("click", () => {
                dropdownmenu[index].classList.toggle("dropdownopen");
            })

        }
    </script>