<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
    <style>
        li.active {
            background-color: yellow;
            font-weight: bold;
        }

        li.active {
            background-color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div>
        <ul>
            <li onclick="handleClick(event)">Item 1</li>
            <li onclick="handleClick(event)">Item 2</li>
            <li onclick="handleClick(event)">Item 3</li>
        </ul>
    </div>

    <!-- <div>
        <ul>
            <li onclick="this.classList.toggle('active'); document.querySelectorAll('li').forEach(e => {if(e !== this) e.classList.remove('active')})">Item</li>
            <li onclick="this.classList.toggle('active'); document.querySelectorAll('li').forEach(e => {if(e !== this) e.classList.remove('active')})">Item</li>
            <li onclick="this.classList.toggle('active'); document.querySelectorAll('li').forEach(e => {if(e !== this) e.classList.remove('active')})">Item</li>
            <li onclick="this.classList.toggle('active'); document.querySelectorAll('li').forEach(e => {if(e !== this) e.classList.remove('active')})">Item</li>
        </ul>
    </div> -->


    <ul onclick="handleClick(event)">
        <li>Item 1</li>
        <li>Item 2</li>
        <li>Item 3</li>
    </ul>

    <script>
        function handleClick(event) {
            const target = event.target;
            const items = document.querySelectorAll("li");

            items.forEach((item) => {
                if (item === target) {
                    item.classList.add("active");
                } else {
                    item.classList.remove("active");
                }
            });
        }
    </script>

    <!-- <script>
        const items = document.querySelectorAll("li");

        items.forEach((item) => {
            item.addEventListener("click", () => {
                items.forEach((otherItem) => {
                    otherItem.classList.remove("active");
                });
                item.classList.add("active");
            });
        });
    </script> -->

    <script>


        function handleClick(event) {
            const target = event.target;
            if (target.tagName === "LI") {
                document.querySelectorAll("li").forEach((item) => {
                    item.classList.toggle("active", item === target);
                });
            }
        }
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>