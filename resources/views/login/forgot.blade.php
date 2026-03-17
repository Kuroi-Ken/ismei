<x-layout :footer="false" :header="false" :chevron="false" title="Forgot Password">

    <div class="flex flex-col mx-auto my-auto h-screen bg-blue-200">
        <div class="m-auto flex-col flex max-w-xl w-full p-10 shadow-2xl rounded-2xl bg-[#F8FAFC]">

            {{-- Logo --}}
            <div class="mb-4">
                <div class="flex justify-center w-full">
                    <img src="../assets/seameo.png" class="size-24" alt="">
                    <img src="../assets/seaqim.png" class="size-24" alt="">
                </div>
                <h1 class="text-center text-[40px] font-bold text-blue-800">ISMEI</h1>
                <h2 class="text-center text-[20px] font-medium text-blue-800">Reset Password</h2>
                <p class="text-center text-sm text-black/50 mt-1">
                    Klik tombol di bawah, link reset akan dikirim ke email admin.
                </p>
            </div>

            {{-- Success --}}
            @if(session('success'))
                <div class="max-w-md mx-auto w-full mb-5 px-4 py-3 bg-green-100 border border-green-300 text-green-700 rounded-xl text-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error --}}
            @if($errors->any())
                <div class="max-w-md mx-auto w-full mb-5 px-4 py-3 bg-red-100 border border-red-300 text-red-700 rounded-xl text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- Tombol kirim — tidak ada input email --}}
            <form action="{{ route('admin.forgot.send') }}" method="POST">
                @csrf
                <div class="max-w-md mx-auto w-full flex flex-col gap-3">
                    <button type="submit"
                        class="cursor-pointer w-full rounded-xl py-2 bg-blue-800 hover:bg-blue-900 transition text-[#F8FAFC]">
                        Kirim Link Reset Password
                    </button>
                    <a href="{{ route('admin.login') }}"
                        class="text-center text-sm text-blue-800 hover:underline">
                        Kembali ke Login
                    </a>
                </div>
            </form>

        </div>
    </div>

</x-layout>