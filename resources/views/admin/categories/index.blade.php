@extends('layouts.admin')

@section('content')

<div>

    <!-- HEADER -->
    <div class="mb-8">

        <h1 class="text-3xl font-black text-slate-800">
            Data Categories
        </h1>

        <p class="text-slate-500 mt-1">
            Kelola kategori event AmikomEventHub
        </p>

    </div>

    <!-- SEARCH + BUTTON -->
    <div class="flex items-center justify-between mb-8">

        <div class="flex items-center gap-3">

            <!-- SEARCH -->
            <form action="{{ route('categories.index') }}"
                  method="GET">

                <div class="relative">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari category..."
                        class="w-80 border border-slate-300 rounded-2xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >

                </div>

            </form>

            <!-- RESET -->
            <a href="{{ route('categories.index') }}"
               class="bg-slate-200 hover:bg-slate-300 text-slate-700 px-5 py-3 rounded-2xl font-semibold transition">

                Reset

            </a>

        </div>

        <!-- BUTTON -->
        <a href="{{ route('categories.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-2xl font-semibold shadow transition">

            + Tambah Category

        </a>

    </div>

    <!-- ALERT -->
    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl mb-6">

            {{ session('success') }}

        </div>

    @endif

    <!-- CARD GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($categories as $category)

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-6 hover:shadow-lg hover:-translate-y-1 transition duration-300">

            <!-- ICON -->
            <div class="flex justify-center mb-5">

                <div class="w-24 h-24 rounded-full bg-indigo-100 flex items-center justify-center">

                    <span class="text-4xl font-bold text-indigo-700">

                        {{ strtoupper(substr($category->name, 0, 1)) }}

                    </span>

                </div>

            </div>

            <!-- NAME -->
            <h2 class="text-center text-2xl font-bold text-slate-800">

                {{ $category->name }}

            </h2>

            <p class="text-center text-slate-400 mt-2">

                Category ID : {{ $category->id }}

            </p>

            <!-- DATE -->
            <div class="mt-6 border-t pt-4 text-sm text-slate-500 space-y-1">

                <p>
                    Dibuat :
                    {{ $category->created_at }}
                </p>

                <p>
                    Diupdate :
                    {{ $category->updated_at }}
                </p>

            </div>

            <!-- BUTTON -->
            <div class="flex gap-3 mt-6">

                <a href="{{ route('categories.edit', $category->id) }}"
                   class="flex-1 bg-yellow-400 hover:bg-yellow-500 text-white text-center py-3 rounded-2xl font-semibold transition">

                    Edit

                </a>

                <form action="{{ route('categories.destroy', $category->id) }}"
                      method="POST"
                      class="flex-1">

                    @csrf
                    @method('DELETE')

                    <button onclick="return confirm('Yakin hapus data?')"
                            class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-2xl font-semibold transition">

                        Hapus

                    </button>

                </form>

            </div>

        </div>

        @empty

        <div class="col-span-3 text-center py-20">

            <p class="text-slate-400 text-lg">

                Data category kosong

            </p>

        </div>

        @endforelse

    </div>

</div>

@endsection