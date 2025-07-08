<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Create Account</title>
</head>
<body>
    <x-shared.top-grad-bar />
    <x-shared.top-navbar />

    <div class="flex flex-col justify-center mt-20 border-4 border-red-500">
        <div class="flex flex-col h-20 justify-center items-center">
            <span class="text-[#575757] font-bold text-8xl">welcome!</span>
            <span class="text-[#575757] font-light text-3xl mt-3">create an account</span>
        </div>

        <div>
            <input
                type="text"
                placeholder="Sample text"
                class="w-[250px] h-[65px] rounded-[10px] border border-[#575757] placeholder-[#575757] text-[#575757] font-light px-4 focus:outline-none focus:border-[#D56C6C] transition-colors duration-200"
            />
        </div>
    </div>
</body>
</html>