@extends('layouts.admin')

@section('content')

<div class="max-w-2xl">

    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8">

        <!-- TITLE -->
        <div class="mb-8">

            <h1 class="text-3xl font-black text-slate-800">
                Edit Partner
            </h1>

            <p class="text-slate-500 mt-2">
                Update data partner atau sponsor
            </p>

        </div>

        <!-- FORM -->
        <form action="{{ route('partners.update', $partner->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <!-- NAMA -->
            <div class="mb-6">

                <label class="block text-slate-700 font-semibold mb-3">

                    Nama Partner

                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $partner->name }}"
                    class="w-full border border-slate-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >

            </div>

            <!-- LOGO -->
            <div class="mb-6">

                <label class="block text-slate-700 font-semibold mb-3">

                    Logo URL

                </label>

                <input
                    type="text"
                    name="logo_url"
                    value="{{ $partner->logo_url }}"
                    class="w-full border border-slate-300 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >

            </div>

            <!-- PREVIEW -->
            <div class="mb-8">

                <label class="block text-slate-700 font-semibold mb-3">

                    Preview Logo

                </label>

                <div class="w-32 h-32 rounded-3xl overflow-hidden border bg-slate-100">

                    <img
                        src="{{ $partner->logo_url }}"
                        class="w-full h-full object-cover"
                    >

                </div>

            </div>

            <!-- BUTTON -->
            <div class="flex gap-4">

                <button
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-2xl font-semibold transition"
                >

                    Update

                </button>

                <a
                    href="{{ route('partners.index') }}"
                    class="bg-slate-200 hover:bg-slate-300 text-slate-700 px-6 py-3 rounded-2xl font-semibold transition"
                >

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection