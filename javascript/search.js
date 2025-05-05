// Function to filter teams based on search input
function filterTeams() {
  let searchInput = document
    .getElementById("teamSearch")
    .value.trim()
    .toLowerCase();

  // If search input is empty, remove any existing highlights
  if (searchInput === "") {
    removeHighlights();
    return;
  }

  // Search the page content and highlight matches
  let matches = findMatches(searchInput);

  // Highlight the matching elements
  if (matches.length > 0) {
    highlightMatches(matches);
  }
}

// Find exact matches for the search query
function findMatches(query) {
  let matches = [];
  let allElements = document.body.getElementsByTagName("*");

  // Loop through all elements to find the exact matches
  for (let el of allElements) {
    if (
      el.children.length === 0 && // Ensure it's not a container with children elements
      el.innerText.trim().toLowerCase().split(/\s+/).includes(query) // Exact word match
    ) {
      matches.push(el);
    }
  }

  return matches;
}

// Highlight the matching elements in orange
function highlightMatches(matches) {
  matches.forEach((el) => {
    el.style.backgroundColor = "#ff9e00"; // Orange background for highlighting
  });
}

// Remove highlights from all elements
function removeHighlights() {
  let allElements = document.body.getElementsByTagName("*");

  // Loop through all elements and remove the background color and border
  for (let el of allElements) {
    el.style.backgroundColor = "";
    el.style.border = "";
  }
}

// Handle Enter key press
document.getElementById("teamSearch").addEventListener("keyup", function (e) {
  if (e.key === "Enter") {
    filterTeams(); // Trigger search when Enter key is pressed
  }
});
