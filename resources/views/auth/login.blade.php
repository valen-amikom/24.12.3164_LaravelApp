<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6">
            Login Admin
        </h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block mb-2">Email</label>
                <input
                    type="email"
                    name="email"
                    class="w-full border rounded px-3 py-2"
                    required
                >
            </div>

            <div class="mb-4">
                <label class="block mb-2">Password</label>
                <input
                    type="password"
                    name="password"
                    class="w-full border rounded px-3 py-2"
                    required
                >
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded"
            >
                Login
            </button>
        </form>
    </div>

</body>
</html>