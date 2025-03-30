<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Weapon Inventory</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white p-6">
  <h1 class="text-2xl mb-4">Weapon Inventory</h1>
  <a href="/dashboard" class="text-blue-400 hover:underline mb-4 inline-block">← Back to Dashboard</a>
  <a href="/weapons/add" class="bg-green-600 p-2 rounded hover:bg-green-700">Add Weapon</a>
  <a href="/weapons/clear" 
   onclick="return confirm('Are you sure you want to delete all weapons?')"
   class="bg-red-600 p-2 rounded hover:bg-red-700 ml-4">
   Clear Inventory
</a>

  <table class="w-full mt-4 table-auto bg-gray-800 rounded">
    <thead>
      <tr>
        <th class="p-2">Name</th>
        <th class="p-2">Location</th>
        <th class="p-2">Quantity</th>
        <th class="p-2">Attachment</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($weapons as $weapon): ?>
        <tr class="border-t border-gray-700">
          <td class="p-2"><?= htmlspecialchars($weapon['name']) ?></td>
          <td class="p-2"><?= htmlspecialchars($weapon['location']) ?></td>
          <td class="p-2"><?= htmlspecialchars($weapon['quantity']) ?></td>
          <td class="p-2">
            <?php
              $jwt = \Firebase\JWT\JWT::encode(['file' => $weapon['attachment']], $_ENV['JWT_SECRET'], 'HS256');
            ?>
            <a href="/weapons/download?file=<?= $jwt ?>" class="text-blue-400 underline">Download</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>