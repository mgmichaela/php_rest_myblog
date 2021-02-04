async function submitPost() {
  const title = document.getElementById("title").value;
  const body = document.getElementById("body").value;
  const author = document.getElementById("author").value;
  const category_id = document.getElementById("category_id").value;

  const data = {
    title, 
    body,
    author,
    category_id
  };

  const response = await fetch('/api/post/create.php', {
    method: 'POST', 
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data) 
  });

  if(response.status === 200){
      alert('Post Submitted')
  } else {
      alert('Failed: Post Was Not Submitted')
  }

}


