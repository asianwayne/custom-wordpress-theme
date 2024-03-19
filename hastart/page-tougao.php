<?php 
get_header(); ?>

 <style>
      form {
        width: 100%;
        margin: 50px auto;
        text-align: center;
        padding: 30px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      }

      h2 {
        margin-bottom: 40px;
        font-weight: bold;
      }

          select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
      }

      input[type="text"],
      input[type="email"],
      input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
      }

      input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
      }

      input[type="submit"]:hover {
        background-color: #3e8e41;
      }

      .input-container {
  border: 1px solid #ccc;
  padding: 5px;
  margin-bottom: 10px;
}

.tags-container {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}

.tag {
  display: flex;
  align-items: center;
  padding: 5px 8px;
  background-color: #f1f1f1;
  border-radius: 5px;
  margin-right: 5px;
  margin-bottom: 5px;
}

.tag-value {
  margin-right: 5px;
}

.tag-close {
  cursor: pointer;
  color: #999;
  font-weight: bold;
  font-size: 16px;
  line-height: 1;
}

    </style>

<div class="container">
  <section class="index_cont list_content">
    <div class="main_cont clear">
      
      <div class="list-cont fl">
        <nav class="breadcrumb"> <?php echo tie_breadcrumbs() ?> </nav>
        <div class="recommend_list mod_list">
          <div class="detail_main">
            <h1 class="page-title"><?php the_title() ?></h1>

            <!-- content -->
            <form>

            <h2>前端投稿</h2>
            <input type="text" name="title" id="tougao-title" placeholder="文章标题">

            <h2>选择分类</h2>
            <select multiple name="tougao-category" id="tougao-category">
              <?php 
              $categories = get_categories( array('hide_empty' => true) );  
              foreach ($categories as $cat) {
                ?>
                <option value="<?php echo $cat->term_id ?>"><?php echo $cat->name; ?></option>

                <?php 
              }

              ?>
              
            </select>

            <div class="input-container">
              <input id="tag-input" type="text" name="tougao-tag" placeholder="Type and hit enter to add a tag">
            </div>
            
            <div class="tags-container">
              <!-- Tags will be added here -->
            </div>

            <div class="keywords-container">
              <input id="keyword-input" type="text" name="keyword-input" placeholder="输入关键词">
            </div>
            <div class="description-container">
              <input id="description-input" type="text" name="description-input" placeholder="输入描述信息">
            </div>

            <div class="upload-container">
              <input id="upload-input" type="file" name="upload-input" accept="image/*">
              <button id="thumbBtn">点击上传到服务器</button>
            </div>

      <textarea name="content" id="tougao-content" cols="30" rows="10"></textarea>
      <button type="button" name="submit" id="tougao-submit">提交</button>
    </form>
            

          </div>

      
        </div>
      </div>
      <?php get_sidebar(); ?> 

      
    </div>
  </section>
</div>
<script src="https://cdn.tiny.cloud/1/your-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
<?php 
get_footer();
 ?>

 <script>
    tinymce.init({
    selector: '#tougao-content',
    height: 500,
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table paste code help wordcount'
    ],
    toolbar:
      'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    content_css: '//www.tiny.cloud/css/codepen.min.css'
});

    function sanitizeInput(input) {
  // Remove any HTML tags
  const sanitizedInput = input.replace(/(<([^>]+)>)/gi, "");

  // Remove any special characters
  const regex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/g;
  return sanitizedInput.replace(regex, "");
}


   const tagInput = document.getElementById('tag-input');
const tagsContainer = document.querySelector('.tags-container');
let tags = [];

tagInput.addEventListener('keydown', function(event) {
  if (event.key === 'Enter') {
    const tagValue = sanitizeInput(tagInput.value.trim());
    if (tagValue !== '') {
      addTag(tagValue);
      tagInput.value = '';
      updateData();
    }
  }
  return tags;
});

function addTag(tagValue) {
  tags.push(tagValue);
  const tagElement = document.createElement('div');
  tagElement.classList.add('tag');
  tagElement.innerHTML = `
    <span class="tag-value">${tagValue}</span>
    <span class="tag-close">&times;</span>
  `;
  const tagClose = tagElement.querySelector('.tag-close');
  tagClose.addEventListener('click', function() {
    removeTag(tagValue, tagElement);
    updateData();
  });
  tagsContainer.appendChild(tagElement);
  
}

function removeTag(tagValue, tagElement) {
  const index = tags.indexOf(tagValue);
  if (index !== -1) {
    tags.splice(index, 1);
  }
  tagsContainer.removeChild(tagElement);
}

function updateData() {
  const tagInputValue = tagInput.value;
  const allTags = [...tags, tagInputValue];
  const tagString = allTags.join(', ');
  // Insert the tagString variable into your data as needed
  
}

      //if the user logged in
      //if the user click the button
      // send the ajax to the backend use wp-ajax to get the password 
       
      jQuery(document).ready(function($){

        //click the button 
      $("#tougao-submit").click(function(e) {
        e.preventDefault();
        
        var title = $("#tougao-title").val();
        title = sanitizeInput(title);
      if (tinymce.get("tougao-content") !== null) {
        var content = tinymce.get("tougao-content").getContent();
        
      }

      var categories = $("#tougao-category").val(); 
        //check the value if is true return 
        if (title == '' || content == '') {

          swal({
            title:'the form is empty check again',
            icon:'error'
          });

        } else {
          //send the ajax to the posts endpoint
          //check if the user is loggin use user endpoint 
          //
          const username = 'wayne';
          const password = "GRZL lCPZ IAOT zxES K9DS w39z";
          const credentials = `${username}:${password}`;
          const encodedCredentials = btoa(credentials);
                //check the user 
                //用wp.api.models.User({id:'me'}) 自带验证
          jQuery.ajax({
            url: '/wp-json/wp/v2/users/me',
            method: 'GET',
            beforeSend: function(xhr) {
              xhr.setRequestHeader('X-WP-Nonce', hastart.nonce_1);
            },

            success: function(data) {
                //代码暂存盘
                
                // The user is logged in
                //send post to the posts endpoint
                const tagSlugs = tags;
                const tagIds = [];
                //send post to the posts endpoint

                $.when.apply($, tagSlugs.map(function(slug) {
                  return $.ajax({
                    url: 'https://xmdn.net/wp-json/wp/v2/tags',
                    method:'GET',
                    data: { slug: slug },
                  }).then(function(response) {
                    if (response.length > 0) {
                      tagIds.push(response[0].id);
                    } else {
                      // Create a new tag with the specified slug
                      return $.ajax({
                        url: 'https://www.xmdn.net/wp-json/wp/v2/tags',
                        method: 'POST',
                        beforeSend: function(xhr)  {
                          xhr.setRequestHeader('Authorization',`Basic ${encodedCredentials}`);
                        },
                        data: {
                          name: slug,
                          slug: slug
                        },
                      }).then(function(response) {
                        tagIds.push(response.id);
                      }).fail(function(err) {
                        console.log(err);
                      });
                    }
                  }).fail(function(err) {
                    console.log(err);
                  });
                })).then(function() {
                  console.log(categories); 
                // All tag requests have completed
                // Create a new post with the specified tags
                $.ajax({
                  url:'https://www.xmdn.net/wp-json/wp/v2/posts',
                  method:'POST',
                  beforeSend: function(xhr)  {
                    xhr.setRequestHeader('Authorization',`Basic ${encodedCredentials}`);
                  },
                  data:{
                    'title':title,
                    'content':content,
                    tags:tagIds,
                    categories:categories,
                    'status':'publish',
                  },
                }).done(function(response) {
                  //这个是done的时候才接受tagsID
                  
                  console.log(tagIds);
                  swal({
                    title:'成功添加文章',
                    icon:'success'}
                    ).then(function(name) {
                      if (name) {
                        window.location = hastart.root_url;
                      }
                    });

                  console.log('Post created:', response);
                  //setTimeout(function(){location.reload();},1000);
                }).fail(function(err) {
                  swal({
                    title:"内部错误",
                    icon:'error',
                  });
                  
                });
              }).fail(function(err) {
                swal({
                    title:"内部错误",
                    icon:'error',
                  });
              });


            },
            //if no user
            error: function(err) {
                // The user is not logged in
                swal({
                  title:"You are not logged in",
                icon: "error",
              });
                
            }
        });
        }});

      });

    </script>
