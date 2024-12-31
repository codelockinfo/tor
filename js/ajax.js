$(document).ready(function () {

  // $('.article-image-slider').slick({
  //     slidesToShow: 1,
  //     slidesToScroll: 1,
  //     autoplay: true,
  //     autoplaySpeed: 2000,
  //     dots: true
  // });
  // document.getElementById("menu-icon").addEventListener("click", function() {
  //     var navMenu = document.getElementById("nav-menu");
  //     navMenu.classList.toggle("active");
  // });

  $("#blogForm").on("submit", function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append("action", "insertBlog");
    $.ajax({
      url: "blogHandler.php",
      type: "POST",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        alert(response.message);
        $("#blogForm")[0].reset();
      },
      error: function () {
        alert("An error occurred while submitting the blog.");
      },
    });
  });

  $("#articleForm").on("submit", function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append("action", "insertArticle");

    $.ajax({
      url: "blogHandler.php",
      type: "POST",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        alert(response.message);
        $("#articleForm")[0].reset();
      },
      error: function () {
        alert("An error occurred while submitting the article.");
      },
    });
  });

  function fetchBlogs() {
    $.ajax({
      url: "blogHandler.php",
      type: "POST",
      data: { action: "fetchBlogs" },
      dataType: "json",
      success: function (response) {
        console.log(response);
        if (response) {
          const blogSelect = $("#articleBlogName");
          blogSelect.html(response.data);
        } else {
          alert("Failed to fetch blogs.");
        }
      },
      error: function () {
        alert("An error occurred while fetching blogs.");
      },
    });
  }
  fetchBlogs();

  function fetchArticles() {
    $.ajax({
      url: "blogHandler.php",
      type: "POST",
      data: { action: "fetchArticles" },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          displayArticles(response.data);
        } else {
          alert("Failed to fetch articles.");
        }
      },
      error: function () {
        alert("An error occurred while fetching articles.");
      },
    });
  }

  function displayArticles(articles) {
    const container = $(".articles-section");
    container.empty();
    console.log(articles);
    if (articles.length === 0) {
      container.append("<p>No articles found.</p>");
      return;
    }

    articles.forEach((article) => {
      const articleHTML = `
            <div class="article-card">
            <div class="article-image">
                <img src="${article.image}" alt="${article.title}">
            </div>
            <div class="article-content">
                <h3>${article.title}</h3>
                <p><img src="image/avatar.webp" alt="Author" class="author-icon">
                    <span class="author-name">By <span class="name">${article.author} ~</span></span> ${article.created}
                </p>
                <p><strong>Blog:</strong> ${article.blog_name}</p>
                <p class="article-description">${article.description}</p>
                <div class="read-container">
                    <a href="/article?/id=${article.article_id}" class="read-more">Read More</a>
                    <p class="read-time"><i class="fas fa-book-open"></i> 1 min read</p>
                </div>
            </div>
        </div>
            `;
      container.append(articleHTML);
    });
  }
  fetchArticles();
});

document.querySelector(".articles-container").addEventListener("click", (event) => {
  if (event.target.classList.contains("read-more")) {
      const articleId = event.target.getAttribute("data-id");
      console.log("Article ID:", articleId);
  }
});
