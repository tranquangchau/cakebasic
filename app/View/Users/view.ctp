<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($user['User']['username']); ?></h1>

<p><small>Created: <?php echo $user['User']['created']; ?></small></p>

<p><?php echo h($user['User']['role']); ?></p>