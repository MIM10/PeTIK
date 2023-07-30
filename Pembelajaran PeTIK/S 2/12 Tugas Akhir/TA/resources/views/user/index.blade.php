@extends('layouts.main')

@section('title', 'HNI Catalog')
@section('container')
    <div class="flex flex-col w-full m-0 items-center">
        {{-- carousel --}}
        <div class="grid grid-cols-1 mt-10 w-[330px] crs:w-[501px] crs1:w-[672px] crs2:w-[843px] crs3:w-[1014px] crs4:w-[1185px] max-w-[1185px] justify-center items-center">
            <div id="default-carousel"
                class="relative w- rounded shadow-[0px_0px_1px_1px_rgba(0,0,0,0.10)]"
                data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="h-auto overflow-hidden rounded-lg ">
                    <!-- Progress bar -->
                    <div class="absolute inset-0 flex items-center justify-center" id="progress-bar">
                        <div class="w-16 h-16 rounded-full border-4 border-gray-300 border-t-[transparent] animate-spin">
                        </div>
                    </div>
                    @foreach ($ar_carousel as $index => $carousel)
                        <!-- Item {{ $index + 1 }} -->
                        <div class="hidden flex justify-center w-full items-center h-full duration-700 ease-in-out my-2"
                            data-carousel-item>
                            <img src="{{ asset($carousel->foto) }}" class="h-[160px] crs1:h-[200px] my-2 mb-10 crs2:h-[250px] crs3:h-[300px]"
                                alt="...">
                        </div>
                    @endforeach
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-2 -translate-x-1/2 bottom-5 left-1/2">
                    @foreach ($ar_carousel as $index => $carousel)
                        <button type="button"
                            class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 focus:bg-gray-400 @if ($index === 0) {{ 'bg-gray-400' }} @endif"
                            aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"
                            data-carousel-slide-to="{{ $index }}"></button>
                    @endforeach
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-1/2 left-4 z-30 flex items-center justify-center h-10 w-10 rounded-full bg-white/30 dark:bg-gray-800/30 transform -translate-y-1/2 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <svg class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </button>
                <button type="button"
                    class="absolute top-1/2 right-4 z-30 flex items-center justify-center h-10 w-10 rounded-full bg-white/30 dark:bg-gray-800/30 transform -translate-y-1/2 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <svg class="w-6 h-6 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>

        <div
            class="flex flex-wrap mt-10 max-w-[1185px] hpK:mx-3 hpG:mx-5 tablet:mx-10 desktop:mx-60 justify-center bg-white gap-3">
            {{-- card --}}
            @foreach ($ar_produk as $i)
                <div onclick="toggleModal('{{ $i->id }}')"
                    class="flex flex-col py-3 rounded hover:bg-gray-200 hover:scale-105 duration-300 cursor-pointer shadow-[0px_0px_1px_1px_rgba(0,0,0,0.10)] bg-white ">
                    <div class="flex justify-center mb-2 mx-3 rounded shadow-[0px_0px_1px_1px_rgba(0,0,0,0.10)] w-[135px]">
                        <img src="{{ asset($i->foto) }}" alt="{{ $i->nama }}" class="min-h-[100px] max-h-[150px] my-2">
                    </div>
                    <div class="flex flex-col mx-3">
                        <div class="mb-10">
                            <p class="text-[13px] ">{{ $i->nama }}</p>
                        </div>
                        <div class="flex flex-row justify-between">
                            <p class="text-[12px] font-extralight text-gray-500">Rp. {{ $i->harga }}</p>
                            <p class="text-[12px] font-extralight text-gray-500">Stok : {{ $i->stok }}</p>
                        </div>
                    </div>
                </div>

                {{-- modal --}}
                <div id="modal{{ $i->id }}" class="hidden fixed inset-0 flex items-center justify-center z-50">
                    <div
                        class="flex flex-col justify-content-center bg-white hpK:w-72 shadow-[0px_0px_3px_3px_rgba(0,0,0,0.10)] rounded-lg p-6 max-w-md">
                        <div class="flex">
                            <div class="text-2xl items-center cursor-pointer mr-2"
                                onclick="toggleModal('{{ $i->id }}')">
                                <ion-icon class="hover:bg-gray-200 duration-200" name="close" id="menuBtn"></ion-icon>
                            </div>
                            <h2 class="text-xl flex text-center font-semibold mt-[-1px] mb-4">Product Details</h2>
                        </div>
                        <div class="mb-5 flex rounded justify-center shadow-[0px_0px_1px_1px_rgba(0,0,0,0.10)] hp:w-28 ">
                            <img src="{{ asset($i->foto) }}" alt="{{ $i->nama }}"
                                class="min-h-[100px] max-h-[150px] my-7">
                        </div>
                        <div class="max-w-lg mx-auto pr-2 h-80 overflow-y-scroll">
                            <div class="flex justify-between">
                                <div>
                                    <p class="mb-1 font-semibold">{{ $i->nama }}</p>
                                    <div class="flex text-[12px] mb-5 font-extralight text-gray-500">
                                        <p class="mr-2">Rp. {{ $i->harga }}</p>
                                        <p class="ml-2">Stok : {{ $i->stok }}</p>
                                    </div>
                                </div>
                                <!-- Add more details here if needed -->
                                <a href="https://api.whatsapp.com/send?phone=+6285772396815&text=Assalamualaikum%20saya%20mau%20pesan%20%3A%0A*{{ $i->nama }}*%0ANama%20%3A%20...%0AJumlah%20%3A%20...%0AAlamat%20%3A%20..."
                                    target="_blank">
                                    <div
                                        class="bg-gray-300 hover:bg-gray-400 duration-300 px-4 py-1 rounded-md cursor-pointer text-center">
                                        Buy
                                    </div>
                                </a>
                            </div>
                            <div>
                                <p class="text-sm font-semibold">Kegunaan</p>
                                <p class="text-[12px] mb-5 font-normal">{{ $i->kegunaan }}</p>
                                <p class="text-sm font-semibold">Komposisi</p>
                                <p class="text-[12px] mb-5 font-normal">{{ $i->komposisi }}</p>
                                <p class="text-sm font-semibold">Aturan Pakai</p>
                                <p class="text-[12px] mb-2 font-normal">{{ $i->aturan_pakai }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
