<x-app-layout>
    <div class="mx-10 mb-20">
        <div class="container flex justify-center flex-col items-center min-h-screen">
            <h1 class="font-bold text-15lg text-center ">Contact us</h1>

            <h1 class="text-6xl text-center font-extrabold text-800 leading-tight mb-6 max-w-2xl">
                We’re Here to Help
            </h1>

            <div class="flex justify-center gap-4 text-sm text-center text-black-700 flex-wrap ">
                <div class="h-4 flex gap-2">
                    <img src="{{asset('/asset/mail.png')}}" alt="mail" class="h-full">
                    contact@getoffer.com
                </div>

                <div class="h-4 flex gap-2">
                    <img src="{{asset('/asset/instagram.png')}}" alt="instagram" class="h-full">
                    @getoffer_official
                </div>

                <div class="h-4 flex gap-2">
                    <img src="{{asset('/asset/linkedin.png')}}" alt="linkedin" class="h-full">
                    linkedin.com/company/getoffer
                </div>
            </div>

        </div>

        <div class="container flex items-center flex-col">
            <h1 class="text-3xl  font-extrabold text-800 leading-tight mb-6">
                Feel Free to Contact
            </h1>
            <p class="text-sm mb-6 text-center max-w-md ">
                We're here to help! Whether you have questions, need support, or just want to say hello, reaching out to us is easy. Use the contact details below, or connect with us via social media. We’ll get back to you as soon as possible.
            </p>
            <img src="{{asset('/asset/contact-image.png')}}" alt="contact image" class="w-1/2">
        </div>
        
    </div>

    
</x-app-layout>