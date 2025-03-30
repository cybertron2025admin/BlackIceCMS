<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Change Password</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center h-screen">
  <form method="POST" action="/password/reset/change" class="bg-gray-800 p-8 rounded-xl shadow-xl w-96 space-y-4">
    <h1 class="text-2xl font-bold text-center">Set New Password</h1>

    <?php if (!empty($error)): ?>
      <div class="bg-red-500 text-white p-2 rounded"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">

    <input type="password" name="password" placeholder="New Password" required
           class="w-full p-2 rounded bg-gray-700 border border-gray-600">
    <input type="password" name="confirm" placeholder="Confirm Password" required
           class="w-full p-2 rounded bg-gray-700 border border-gray-600">

    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 p-2 rounded">Change Password</button>
  </form>
</body>
</html>
