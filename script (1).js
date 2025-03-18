const apiKey = "YOUR_API_KEY";

// Example usage (replace with your actual API endpoint and parameters)
const apiUrl = "https://api.example.com/data";

// Function to fetch data from the API
async function fetchData() {
    try {
        const response = await fetch(apiUrl, {
            headers: {
                "Authorization": `Bearer ${apiKey}` // Example header with API key
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        console.log("Data from API:", data);
    } catch (error) {
        console.error("Error fetching data:", error);
    }
}

fetchData();