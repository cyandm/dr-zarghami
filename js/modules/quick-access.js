let sectionHeadings = document.querySelectorAll("#content-single h2 ,#content-single h3");
let scrollList = document.querySelector(".scroll-list");
if (sectionHeadings && scrollList) {
  let scrollList = document.querySelector(".scroll-list");
  let counter = 1;
  // Assign id
  sectionHeadings.forEach(function (heading, index) {
    // Create a random ID
    let randomId = "section-" + counter;
    // Assign the ID to the heading
    heading.id = randomId;

    // Assign the ID to  headings h2 , h3 in the blog content
    let contentHeadings = document.querySelectorAll("#content-single h2 , #content-single h3");
    contentHeadings[index].id = randomId;


    // Create a link in the quick access list
    let listItem = document.createElement("li");
    if (contentHeadings[index].tagName === "H3") {
      listItem.classList.add("sub-li");
     
    }
   
    let link = document.createElement("a");
    link.textContent = heading.textContent;
    link.href = "#" + randomId;
    listItem.appendChild(link);
    scrollList.appendChild(listItem);
    counter++;
  });
}
