function displayPosts(post, index) {
  const postNumber = index + 1;

  const singlePostDiv = document.createElement("div");
  singlePostDiv.setAttribute("id", `post-${postNumber}`);

  const titleElement = document.createElement("h1");
  titleElement.innerHTML = post.title || "No Title"; 

  const authorElement = document.createElement("h2");
  authorElement.innerHTML = `Author: ${post.author || "Unknown Author" }`;

  const bodyElement = document.createElement("p");
  bodyElement.innerHTML = post.body || "Empty Post";

  singlePostDiv.appendChild(titleElement);
  singlePostDiv.appendChild(authorElement);
  singlePostDiv.appendChild(bodyElement);

  const allPostsDiv = document.getElementById("posts");
  allPostsDiv.appendChild(singlePostDiv);
};

(async function loadPosts() {
  const response = await fetch("/api/post/read.php", {
    method: "GET",
  });
  const data = (await response.json()).data;
  data.forEach(displayPosts);
})();
