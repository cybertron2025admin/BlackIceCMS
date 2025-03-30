<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Password Reset</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center h-screen">
  <form method="POST" action="/password/reset/submit" class="bg-gray-800 p-8 rounded-xl shadow-xl w-96 space-y-4">
    <h1 class="text-2xl font-bold text-center">Reset Password</h1>
    <?php if (!empty($_SESSION['message'])): ?>
      <div class="bg-green-600 p-2 rounded"><?= $_SESSION['message'] ?></div>
      <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    <input type="email" name="email" placeholder="Your email" class="w-full p-2 rounded bg-gray-700 border border-gray-600" required>
    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 p-2 rounded">Send Reset Link</button>
  </form>
</body>
</html>