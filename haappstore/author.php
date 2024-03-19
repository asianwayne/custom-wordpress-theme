<?php
get_header();
$author_id = get_query_var('author'); // Get the author ID from the query variable

// Retrieve the download history for the author
$download_history = get_user_meta($author_id, 'download_history', true);
?>

<h2>Download History</h2>
<table>
  <thead>
    <tr>
      <th>File URL</th>
      <th>Download Date</th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($download_history)) : ?>
      <?php foreach ($download_history as $download) : ?>
        <tr>
          <td><a href="<?php echo $download['file_url']; ?>" download><?php echo $download['file_url']; ?></a></td>
          <td><?php echo $download['download_date']; ?></td>
        </tr>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="2">No download history found.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<?php get_footer() ?>
