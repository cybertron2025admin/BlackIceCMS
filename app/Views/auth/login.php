<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cyber Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center h-screen">
  <img style="position: absolute; top: 0px" src="/image.jpg"><br/>
  <form method="POST" action="/login" class="bg-gray-800 p-8 rounded-xl shadow-xl w-96 space-y-4">
    <h1 class="text-2xl font-bold text-center">Cyber Login</h1>
    <?php if (!empty($error)): ?>
      <div class="bg-red-500 text-white p-2 rounded"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <input type="email" name="email" placeholder="Email" class="w-full p-2 rounded bg-gray-700 border border-gray-600" required>
    <input type="password" name="password" placeholder="Password" class="w-full p-2 rounded bg-gray-700 border border-gray-600" required>
    <input type="hidden" name="flag" value="Q1lCRVJUUk9OX0ZMQUdBW0tub3dIb3dUb0hvc3RXb3Jrc10=">
    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 p-2 rounded">Login</button>
    <a href="/password/reset" class="text-sm text-gray-400 hover:underline block text-center">Forgot password?</a>
  </form>
</body>
</html>
