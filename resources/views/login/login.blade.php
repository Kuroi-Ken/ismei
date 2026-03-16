<x-layout :footer="false" :header="false" :chevron="false" title="Admin Login">
    <form class="flex flex-col mx-auto my-auto  h-screen bg-blue-200" action="">
        <div class="m-auto flex-col flex max-w-xl w-full p-10 shadow-2xl rounded-2xl bg-[#F8FAFC] ">
            <div class="">
                <div class="flex max-w-4xl justify-center w-full">
                    <img src="../assets/seameo.png" class="size-24" alt="">
                    <img src="../assets/seaqim.png" class="size-24" alt="">
                    <img src="" alt="">
                </div>
                <h1 class="text-center text-[40px] font-bold text-blue-800">ISMEI</h1>
                <h2 class="text-center text-[25px] font-medium text-blue-800">Admin Panel</h2>
            </div>
            <div class="max-w-md py-3  w-full mx-auto">
                <h3 class="pb-1 px-2">Email</h3>
                <input type="email" class="outline-none rounded-xl py-2 px-3 border w-full" placeholder="insert email here">
                <h3 class="pb-1 pt-5 px-2">Password</h3>
                <input type="password" class="outline-none py-2 rounded-xl px-3 border w-full" placeholder="insert password here">
            </div>
            <a class="text-right max-w-md justify-center mb-7 hover:text-blue-800" href="/forgot-the-password">Forgot Password?</a>
            <button class="cursor-pointer max-w-md w-full rounded-xl py-2 mx-auto bg-blue-800 text-[#F8FAFC]">Login</button>
        </div>
            
    </form>
</x-layout>