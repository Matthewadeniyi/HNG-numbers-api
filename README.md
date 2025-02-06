# Number Classification API

## Description
The **Number Classification API** takes a number as input and returns its mathematical properties along with a fun fact. This API checks if the number is prime, perfect, Armstrong, and determines its parity (odd/even). It also calculates the sum of its digits and retrieves a fun fact from the Numbers API.

## Features
- Determines whether a number is **prime**.
- Checks if a number is a **perfect number**.
- Identifies **Armstrong numbers**.
- Classifies the number as **odd or even**.
- Computes the **sum of digits**.
- Fetches a **fun fact** about the number from the Numbers API.
- Returns results in **JSON format**
- **Handles errors** gracefully.
- Supports **CORS** (Cross-Origin Resource Sharing).

## API Endpoint
### **GET** `/api/classify-number?number={number}`

### Example Request
```bash
GET https://your-domain.com/api/classify-number?number=371
```

### Example Response (200 OK)
```json
{
    "number": 371,
    "is_prime": false,
    "is_perfect": false,
    "properties": ["armstrong", "odd"],
    "digit_sum": 11,
    "fun_fact": "371 is an Armstrong number because 3^3 + 7^3 + 1^3 = 371"
}
```

### Error Response (400 Bad Request)
If the `number` parameter is missing or invalid:
```json
{
    "number": "alphabet",
    "error": true
}
```

## Installation & Setup
### Prerequisites
- PHP installed on your system.
- A server environment like Apache or Nginx (or use PHP’s built-in server).

### Steps to Run Locally
1. Clone the repository:
   ```bash
   git clone https://github.com/Matthewadeniyi/HNG-numbers-api.git
   ```
2. Navigate to the project directory:
   ```bash
   cd number-classification-api
   ```
3. Start a PHP server:
   ```bash
   php -S localhost:8000
   ```
4. Access the API at:
   ```
   http://localhost:8000/api/classify-number?number=371
   ```

## Deployment
To deploy the API, you can use:
- **Vercel** (recommended for quick deployment)
- **Heroku**
- **Shared hosting** with PHP support

## Technologies Used
- **PHP** (Backend processing)
- **Numbers API** (For fun facts)
- **JSON** (Response format)

## Contributing
Feel free to submit pull requests or open issues to improve this API.

## License
This project is licensed under the MIT License.

