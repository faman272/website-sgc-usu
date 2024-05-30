 {{-- Modal Confirmation Alert --}}
 <div id="confirm-logout" class="fixed hidden inset-0 bg-gray-950/50 dark:bg-gray-950/75">
    <div class="flex items-center justify-center h-full">
        <div class="bg-white p-5 rounded-lg w-96">
            {{-- CLose button --}}
            <span class="flex justify-end">
                <button onclick="closeModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </span>
            <div class="mb-5 flex items-center justify-center">
                <div class="rounded-full p-3 bg-accent/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-accent">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                    </svg>

                </div>
            </div>
            <p class="font-semibold text-gray-950 text-base leading-6 text-center">Logout</p>
            <p class="mt-2 text-center text-sm text-gray-500">Apakah anda yakin ingin keluar?</p>
            <div class="mt-4 w-full flex gap-3">
                <button onclick="closeModal()" class="px-4 py-2 bg-white shadow-md text-sm w-full rounded-lg">Cancel</button>
                <button class="px-4 py-2 bg-accent shadow-sm text-sm w-full text-white rounded-lg">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script>
    const confirmLogout = document.getElementById('confirm-logout');
    const closeModal = () => {
        confirmLogout.classList.add('hidden');
    }
</script>