<div class="bg-[#F0F0F0] px-4 py-6">
    <h1 class="md:text-3xl text-xl font-bold text-center" style="color:#486faf;">Dejanos un mensaje</h1>
    <div class="flex justify-center">

        <div style="max-width: 640px;width: 100%;">

            <form class="px-3" method="post" action="">
                <div class="mb-3">
                    <label class="block mb-1 text-sm font-medium text-gray-900 ">Nombre</label>
                    <input autocomplete="on" type="text" id="nombre" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Tu nombre" required>
                </div>
                <div class="mb-3">
                    <label class="block mb-1 text-sm font-medium text-gray-900 ">Mail</label> 
                    <input autocomplete="on" name="email" type="email" id="mail" placeholder="Tu mail" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required>
                </div>
                <div class="mb-3"> 
                    <label class="block mb-1 text-sm font-medium text-gray-900 ">Mensaje</label>
                    <textarea name="message" placeholder="Tu mensaje" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  " required style="padding: 5px 5px 45px 5px;"></textarea>
                </div>
                <button name="contact_form_submit" style="position: relative; left: 50%; transform: translateX(-50%); background-color: #486faf; margin: 10px 0 50px 0;" type="submit" class=" text-white  cursor-pointer  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Enviar
                    mensaje</button>
            </form>
        </div>
    </div>
</div>