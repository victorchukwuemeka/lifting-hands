@extends('layouts.app')



@section('sidebar')
    @parent

@endsection

@section('content')


<body class="bg-gray-100">
    <!-- Navigation bar -->
    <nav class="bg-blue-500 py-4 text-white text-center">
        <h1 class="text-3xl font-bold">Contact Us</h1>
    </nav>

    <!-- Main content -->
    <main class="container mx-auto my-4 p-4 bg-white shadow-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Contact Form -->
            <form method="POST"   action="{{ url('/add_member') }}"class="p-4" enctype="multipart/form-data">
               @csrf
                <div class="mb-4">
                    <label for="name" class="block font-semibold mb-2">Name</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="email" class="block font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="message" class="block font-semibold mb-2">Message</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-3 py-2 border rounded"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Send Message
                </button>
            </form>

            <!-- Contact Information -->
            <div class="p-4">
                <h2 class="text-2xl font-bold mb-4">Contact Information</h2>
                <p class="mb-2"><strong>Address:</strong> 123 Main Street, City, Country</p>
                <p class="mb-2"><strong>Email:</strong> info@example.com</p>
                <p class="mb-2"><strong>Phone:</strong> +1 (123) 456-7890</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-500 py-4 text-white text-center">
        <p>&copy; 2023 Your Company. All rights reserved.</p>
    </footer>
</body>



@endsection
