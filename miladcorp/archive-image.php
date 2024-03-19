<?php 
get_header(  );
 ?>
<style>
  /* Styles for the loading spinner */
  .loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
    margin: 20px auto;
  }
  
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  
  /* Style for the container to hold the grid */
  .container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    grid-gap: 20px;
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }
  .none {
    display: none;
  }

  /* Style for the image */
  .image {
    width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
</style>


<div class="container" id="container">
  <!-- Images will be appended here -->
</div>

<!-- Loading spinner -->
<div class="loader none" id="loader"></div>

<div id="message" style="text-align: center;"></div>

<script>
  let page = 1; // Initial page number
const perPage = 6; // Number of items per page
let isLoading = false; // Set initially to true to prevent spinner on first load
let spinnerVisibel = false;

// Function to fetch data from API
async function fetchData() {
  try {
    isLoading = true;
    const response = await fetch(`https://www.milad.com.cn/wp-json/wp/v2/image?page=${page}&per_page=${perPage}`);
    const data = await response.json();
    isLoading = false;
    return data;
    
  } catch (error) {
    console.error('Error fetching data:', error);
  } 
}

// Function to render data
function renderData(data) {
  const container = document.getElementById('container');
  data.forEach(item => {
    const imageElement = document.createElement('img');
    imageElement.classList.add('image');
    imageElement.src = item.thumbnail;
    imageElement.alt = item.title;
    container.appendChild(imageElement);
  });
}

// Function to handle scroll event
async function handleScroll() {
  const { scrollTop, clientHeight, scrollHeight } = document.documentElement;
  if (scrollTop + clientHeight >= scrollHeight - 5 && !isLoading) {
    isLoading = true;
    page++;
    const data = await fetchData();
    if (data.length === 0) {
      window.removeEventListener('scroll', handleScroll); // Remove scroll event listener if no more content
      document.getElementById('message').innerText = "No more content";
      return;
    }
    renderData(data);
  }
}

// Event listener for scroll
window.addEventListener('scroll', handleScroll);

// Initial data load
fetchData().then(data => {
   // Set isLoading to false after initial data load
   isLoading = true;
  renderData(data);

  isLoading = false;
});

 // Show/hide loader based on loading state
 clearInterval(interVal);
  const loader = document.getElementById('loader');
  interVal =  setInterval(() => {
    loader.classList.toggle('none', !isLoading);
  }, 100); // Adjust interval as needed

</script>


<?php 



get_footer(  );