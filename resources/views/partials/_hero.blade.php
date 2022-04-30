<section
    class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
>
    <div
        class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
        style="background-image: url('images/logo.png')"
    ></div>

    <div class="z-10">
        <h1 class="text-6xl font-bold uppercase text-white">
            Jobi<span class="text-black">Fy</span>
        </h1>
        <p class="text-2xl text-gray-200 font-bold my-4">
            Find or post jobs & projects
        </p>
        <div>
            @auth
            <p class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">
                    Enjoy creating jobs & projects for people to find 
            </p>
            
            @else
            <a
                href="/register"
                class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                >Sign Up to add job advertisment </a
            >
            @endauth
        </div>
    </div>
</section>