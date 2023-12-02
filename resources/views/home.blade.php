<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Blog Template</title>
    <meta name="author" content="Grupo 5">
    <meta name="description" content="FERRETERIA">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>


    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body class="bg-white font-family-karla">

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="#">PRODUCTOS</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="#">NOSOTROS</a></li>
                </ul>
            </nav>

            <div class="flex items-center text-lg no-underline text-white pr-6">
                <a class="hover:text-gray-200 hover:underline px-4" href="{{"dashboard/login"}}">Login</a>
            </div>
        </div>

    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                FERRETERIA MJF
            </a>
            <p class="text-lg text-gray-600">
                GRUPO 5
            </p>
        </div>
    </header>

    <!-- Topic Nav -->
    <nav class="w-full py-4 border-t border-b bg-gray-100" ">

        <div class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">HERRAMIENTAS</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">MATERIAL DE CONSTRUCION</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">PINTURA</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">JARDINERIA</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">ALAMACENAMIENTO</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">ILUMINACION</a>
            </div>
        </div>
    </nav>


    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="https://d100mj7v0l85u5.cloudfront.net/s3fs-public/2023-04/funciones-del-jefe-de-compras-6.png">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Prductos</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">varidad de precios y marcas</a>

                    <a href="#" class="pb-6"> Contamos con un catalogo de todas tus marcas preferidas por que para FERRETERIA MJF nos interesa tus necesidades</a>
                    <a href="#" class="uppercase text-gray-800 hover:text-black">Catalogo <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="https://thumbs.dreamstime.com/z/cruquius-en-los-pa%C3%ADses-bajos-de-julio-departamento-iluminaci%C3%B3n-ferreter%C3%ADa-el-una-variedad-modelos-226732146.jpg">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">ILUMINACION</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">variedad de iluminarias para tu hogar</a>
                    <p
                     href="#" class="pb-6">Buenos precios y de calidad, desde focos ahorradores y todo tipo de decoracion para iluminar tu hogar</a>
                    <a href="#" class="uppercase text-gray-800 hover:text-black">Catalogo <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>



            <!-- Pagination -->
            <div class="flex items-center py-8">
                <a href="#" class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">1</a>
                <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center">2</a>
                <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">Next <i class="fas fa-arrow-right ml-2"></i></a>
            </div>

        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">NOSOTROS</p>
                <p class="pb-2">Comprometidos a darte un servicio de calidad, brindandote una gama de productos de alta calidad y mucha bariedad </p>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Contactanos
                </a>
            </div>


        </aside>

    </div>

    <footer class="w-full border-t bg-white pb-12">

        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a href="#" class="uppercase px-3">NOSOTROS</a>
                <a href="#" class="uppercase px-3">GARANTIAS</a>
                <a href="#" class="uppercase px-3">CONTCATANOS</a>
            </div>
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                <a class="" href="#">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
            <div class="uppercase pb-6">&copy; fereterriaMJF.com</div>
        </div>
    </footer>



</body>
</html>
