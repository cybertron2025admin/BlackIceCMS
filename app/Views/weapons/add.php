<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Add Weapon</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-6">
  <h1 class="text-2xl mb-4">Add New Weapon</h1>
  <form method="POST" action="/weapons/store" enctype="multipart/form-data" class="space-y-4 bg-gray-800 p-4 rounded">
    <input type="text" name="name" placeholder="Name" required class="w-full p-2 rounded bg-gray-700 border border-gray-600">
    <input type="text" name="location" placeholder="Location" required class="w-full p-2 rounded bg-gray-700 border border-gray-600">
    <input type="number" name="quantity" placeholder="Quantity" required class="w-full p-2 rounded bg-gray-700 border border-gray-600">
    <input type="file" name="attachment" required class="w-full p-2">
    <input type="hidden" name="path" value="/../../storage/attachments/">
    <button type="submit" class="w-full bg-blue-600 p-2 rounded hover:bg-blue-700">Add</button>
  </form>
</body>
</html>