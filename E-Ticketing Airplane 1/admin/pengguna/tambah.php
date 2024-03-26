<?php

session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../../auth/login/index.php';
    </script>
    ";
}

if(isset($_POST["tambah"])){
    if(tambah($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data pengguna berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yhaa .. data pengguna gagal ditambahkan :(')
                window.location = 'index.php'
            </script>
        ";
    }
}



?>

<?php require '../../layouts/sidebar_admin.php'; ?>

    <div class="p-6">
        <h1 class="text-2xl font-semibold text-gray-800">User</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            
        <div class="mt-6">
            
            <label for="username" class="block text-sm font-medium text-gray-600">Username</label>
            <input type="text" id="username" name="username" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500 ">

            <label for="nama_lengkap" class="block text-sm font-medium text-gray-600">Nama lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500 ">

            <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
            <input type="password" id="password" name="password" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500">

            <label for="roles" class="block text-sm font-medium text-gray-600">Role</label>
            <select id="roles" name="roles" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500">
                <option value="Maskapai">Maskapai</option>
                <option value="Penumpang">Penumpang</option>
            </select>

            <button type="submit" name="tambah" class="mt-4 mb-2 rounded-lg inline-block text-white text-base py-2 px-4 bg-blue-600">Tambah User</button>

        </div>
        </form>
    </div>