<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Email Logs</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-6">
  <h1 class="text-2xl mb-4">Email Logs</h1>
  <a href="/dashboard" class="text-blue-400 hover:underline mb-4 inline-block">← Back to Dashboard</a>
  <table class="w-full table-auto bg-gray-800 rounded">
    <thead>
      <tr>
        <th class="p-2">Recipient</th>
        <th class="p-2">Subject</th>
        <th class="p-2">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($logs as $log): ?>
        <tr class="border-t border-gray-700">
          <td class="p-2"><?= htmlspecialchars($log['recipient']) ?></td>
          <td class="p-2"><?= htmlspecialchars($log['subject']) ?></td>
          <td class="p-2"><?= htmlspecialchars($log['body']) ?></td>
          <td class="p-2"><?= htmlspecialchars($log['status']) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>