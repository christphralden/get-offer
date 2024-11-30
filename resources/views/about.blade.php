<x-app-layout>
    <div class="mx-10 mb-20 ">

        <div class="container flex justify-center flex-col items-center min-h-screen">
            <h1 class="font-bold text-15lg text-center ">About us</h1>

            <h1 class="text-6xl text-center font-extrabold text-800 leading-tight mb-6 max-w-2xl">
                Create Opportunities by Building Connections
            </h1>

            <p class="text-base text-center text-black-700 max-w-md ">
                Whether you're seeking your dream job or searching for the perfect candidate, we're here to make recruitment seamless, efficient, and personal.
            </p>

        </div>

        <div class="container flex gap-32  justify-between mb-20">
            <div class="w-full lg:w-1/2">
                <h1 class="font-bold text-15lg  mb-1">Our mission</h1>

                <h1 class="text-3xl  font-extrabold text-800 leading-tight mb-6">
                    Bridging Talent with Opportunity
                </h1>

                <p class="text-sm mb-6 ">
                    We believe that empowering individuals and organizations by connecting top talent with the right opportunities is essential to fostering growth and success. By creating meaningful connections, we help build stronger teams, careers, and futures.
                </p>

                <div class="w-full h-auto flex flex-col">

                    <div class="w-full h-auto flex flex-col overflow-hidden ">

                        <button class="w-full font-extrabold text-left text-lg text-800 px-4 py-1 border-b-2 border-solid border-gray-400 flex items-center gap-1 z-10 transition-all duration-500 ease-in-out" onclick="toggleDropdown(this)">
                            <span class="w-full ">Empowering Talent Development</span>
                            <span class="icon font-extrabold text-left text-4xl h-full">+</span>
                        </button>

                        <div class=" text-sm w-full max-h-0 opacity-0 transform  overflow-hidden transition-all duration-500 ease-in-out px-4 py-2">We believe in unlocking the full potential of individuals by providing opportunities for continuous learning, growth, and skill enhancement. Through tailored programs and mentorship, we help individuals refine their expertise and build careers that thrive in a rapidly evolving world.</div>

                    </div>

                    <div class="w-full h-auto flex flex-col overflow-hidden ">

                        <button class="w-full font-extrabold text-left text-lg text-800 px-4 py-1 border-b-2 border-solid border-gray-400 flex items-center gap-1 z-10 transition-all duration-500 ease-in-out" onclick="toggleDropdown(this)">
                            <span class="w-full ">Building Stronger Communities Through Collaboration</span>
                            <span class="icon font-extrabold text-left text-4xl h-full">+</span>
                        </button>

                        <div class=" text-sm w-full max-h-0 opacity-0 transform  overflow-hidden transition-all duration-500 ease-in-out px-4 py-2">Our mission extends beyond individual success to focus on building stronger, interconnected communities. We create platforms for collaboration, where individuals, businesses, and organizations can share knowledge and resources to create positive social impact and collective growth.</div>

                    </div>

                    <div class="w-full h-auto flex flex-col overflow-hidden ">

                        <button class="w-full font-extrabold text-left text-lg text-800 px-4 py-1 border-b-2 border-solid border-gray-400 flex items-center gap-1 z-10 transition-all duration-500 ease-in-out" onclick="toggleDropdown(this)">
                            <span class="w-full ">Creating Sustainable Economic Growth</span>
                            <span class="icon font-extrabold text-left text-4xl h-full">+</span>
                        </button>

                        <div class=" text-sm w-full max-h-0 opacity-0 transform  overflow-hidden transition-all duration-500 ease-in-out px-4 py-2">We are committed to fostering sustainable economic growth by connecting talent with opportunities that drive job creation, entrepreneurship, and inclusive development. By supporting local economies and industries, we aim to create decent work opportunities and promote economic resilience.</div>

                    </div>


                </div>

            </div>

            <div class="w-1/2 p-4  items-center justify-center hidden lg:block">
                <img  src="{{asset('asset/about-mission-image.avif')}}" alt="about-mission" class="rounded-lg w-full min-h-[500]">
            </div>
        </div>

        <div class="container flex gap-32  justify-between">
            <div class="w-1/2 p-4  items-center justify-center hidden lg:block">
                <img  src="{{asset('asset/about-partner-image.avif')}}" alt="about-mission" class="rounded-lg w-full min-h-[500]">
            </div>

            <div class="w-full lg:w-1/2">
                <h1 class="font-bold text-15lg  mb-1">Why choose us</h1>

                <h1 class="text-3xl  font-extrabold text-800 leading-tight mb-6">
                    Why Partner with Us?
                </h1>

                <p class="text-sm mb-6 ">
                    Unlock unparalleled opportunities for growth, innovation, and success when you choose us as your trusted partner. We are committed to building a collaborative environment where talent meets opportunity, creating lasting impacts across industries and communities. Our personalized approach, expert-driven solutions, and dedication to your success make us the perfect choice for those seeking a transformative experience.
                </p>

                <div class="w-full h-auto flex flex-col">

                    <div class="w-full h-auto flex flex-col overflow-hidden ">

                        <button class="w-full font-extrabold text-left text-lg text-800 px-4 py-1 border-b-2 border-solid border-gray-400 flex items-center gap-1 z-10 transition-all duration-500 ease-in-out" onclick="toggleDropdown(this)">
                            <span class="w-full ">Expertise That Drives Results</span>
                            <span class="icon font-extrabold text-left text-4xl h-full">+</span>
                        </button>

                        <div class=" text-sm w-full max-h-0 opacity-0 transform  overflow-hidden transition-all duration-500 ease-in-out px-4 py-2">With years of industry experience and a dedicated team of professionals, we provide insights and solutions that drive measurable outcomes. Our expertise ensures that your goals are met with precision and efficiency, allowing you to stay ahead in an ever-evolving market.</div>

                    </div>

                    <div class="w-full h-auto flex flex-col overflow-hidden ">

                        <button class="w-full font-extrabold text-left text-lg text-800 px-4 py-1 border-b-2 border-solid border-gray-400 flex items-center gap-1 z-10 transition-all duration-500 ease-in-out" onclick="toggleDropdown(this)">
                            <span class="w-full ">Personalized Approach for Success</span>
                            <span class="icon font-extrabold text-left text-4xl h-full">+</span>
                        </button>

                        <div class=" text-sm w-full max-h-0 opacity-0 transform  overflow-hidden transition-all duration-500 ease-in-out px-4 py-2">We believe in crafting tailored strategies that fit your unique needs. Our commitment to understanding your specific challenges enables us to deliver solutions that align perfectly with your vision, ensuring sustainable growth and long-term success.</div>

                    </div>

                    <div class="w-full h-auto flex flex-col overflow-hidden ">

                        <button class="w-full font-extrabold text-left text-lg text-800 px-4 py-1 border-b-2 border-solid border-gray-400 flex items-center gap-1 z-10 transition-all duration-500 ease-in-out" onclick="toggleDropdown(this)">
                            <span class="w-full ">Impactful Collaboration for a Better Future</span>
                            <span class="icon font-extrabold text-left text-4xl h-full">+</span>
                        </button>

                        <div class=" text-sm w-full max-h-0 opacity-0 transform  overflow-hidden transition-all duration-500 ease-in-out px-4 py-2">We’re more than just a service provider; we’re your strategic partner in creating lasting change. By aligning with the UN’s Sustainable Development Goals (SDG 8: Decent Work and Economic Growth), we focus on promoting inclusive economic growth, employment, and innovation, ensuring a brighter and more sustainable future for all.</div>

                    </div>
                </div>
            </div>
        </div>         
    </div>

    <script>
        function toggleDropdown(button) {
            const content = button.nextElementSibling;
            const btn = button;
            const icon = button.querySelector('.icon')
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                content.style.opacity = '0';
                btn.style.borderColor =''
                icon.textContent = '+'
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                content.style.opacity = '1';
                btn.style.borderColor ='black'
                icon.textContent = '-'
            }
        }
    </script>

    
</x-app-layout>
