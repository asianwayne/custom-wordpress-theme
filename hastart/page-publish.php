<?php 
/**
 * This is the templates for publish post from frontend
 * 
 */


get_header(); ?>


<form>
  <label>
    Title:
    <input type="text" id="title" required>
  </label>
  <br>
  <label>
    Content:
    <textarea id="content" required></textarea>
  </label>
  <br>
  <button type="button" onclick="createPost()">Create Post</button>
</form>





<?php get_footer();?>


<script>
    function createPost() {
        // Get the title and content from the form
        var title = document.getElementById("title").value;
        var content = document.getElementById("content").value;
        
        // Get the nonce for authentication

        // Send a POST request to the API endpoint for creating posts
        fetch('https://xmdn.net/wp-json/wp/v2/posts', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-WP-Nonce': hastart.nonce
            },
            body: JSON.stringify({
                title: title,
                content: content,
                status: 'publish'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.id) {
                alert("Post created successfully!");
            } else {
                alert("Failed to create post!");
            }
        })
        .catch(error => console.error(error));
    }
</script>
