<div class=" text-center admin-default-index">
    <style>
        html, body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* define a fixed width for the entire menu */
        .navigation {
            width: 450px;
            margin-left: 30%;
        }

        /* reset our lists to remove bullet points and padding */
        .mainmenu, .submenu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* make ALL links (main and submenu) have padding and background color */
        .mainmenu a {
            display: block;
            background-color: #333333;
            text-decoration: none;
            padding: 10px;
            color: #ffffff;
        }

        /* add hover behaviour */
        .mainmenu a:hover {
            background-color: #4a4a4a;
        }


        /* when hovering over a .mainmenu item,
          display the submenu inside it.
          we're changing the submenu's max-height from 0 to 200px;
        */

        .mainmenu li:hover .submenu {
            display: block;
            max-height: 400px;
        }

        /*
          we now overwrite the background-color for .submenu links only.
          CSS reads down the page, so code at the bottom will overwrite the code at the top.
        */

        .submenu a {
            background-color: #999;
        }

        /* hover behaviour for links inside .submenu */
        .submenu a:hover {
            background-color: #666;
        }

        /* this is the initial state of all submenus.
          we set it to max-height: 0, and hide the overflowed content.
        */
        .submenu {
            overflow: hidden;
            max-height: 0;
            -webkit-transition: all 0.5s ease-out;
        }
    </style>
    <h1 class="text-center">Ласкаво просимо до адміністративної панелі сайту!</h1>
    <div class="container text-center">
        <h4>
            <nav class="navigation">
                <ul class="mainmenu">
                    <li><a href="/site/index">Повернутись у режим користувача</a></li>
                    <li><a href="/admin/order">Бронювання</a></li>
                    <li><a href="/admin/carmodel">Автомобілі</a>
                        <ul class="submenu">
                            <li><a href="/admin/car">а</a></li>
                            <li><a href="/admin/category">Категорії</a></li>
                        </ul>
                    </li>
                    <li><a href="/admin/user">Користувачі</a>
                        <ul class="submenu">
                            <li><a href="/admin/car">Список блокувань</a></li>
                            <li><a href="/admin/categories">Інформація про користувачів</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </h4>

    </div>
</div>
