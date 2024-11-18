# Movie Sales Analysis Application

## Introduction

The **Movie Sales Analysis Application** is a Laravel-based web application designed to analyze movie theater sales data. It allows users to find the top-performing theater based on ticket sales for a selected date and provides a visual representation of sales distribution among theaters through a pie chart.

## Features

- **Top Theater Identification**: Input a date to find the top-performing theater based on ticket sales.
- **Sales Visualization**: Display total tickets sold by each theater on the selected date using an interactive pie chart powered by Chart.js.
- **Data Analysis**: Analyze sales data across multiple theaters and movies.
- **Extensible Architecture**: Built with a modular architecture following best practices for maintainability and scalability.

## Prerequisites

Before setting up the project, ensure you have the following installed:

- **Docker**
- **Docker Compose**

---

## Installation

**Clone the Repository**

   ```bash
   git clone https://github.com/alinapotupchik/movie-research-php
   cd movie-research-php
   ```
## Environment Setup

The project is containerized using Docker and Docker Compose. Follow the steps below to set up the environment.

**Copy .env File**

```bash
cp .env.example .env
```

**Build and Start the Docker Containers**

```bash
docker-compose up -d --build
```

**Install Composer Dependencies**

Execute the following command inside the app container:
```bash
docker-compose exec app composer install
```

**Generate Application Key**

Inside the app container, run:
```bash
docker-compose exec app php artisan key:generate
```

**Run Migrations and Seeders**
```bash
docker-compose exec app php artisan migrate --seed
```

**Access the Application**

The application should be accessible at http://localhost:8000/sales.

**Database Schema and Data Explanation.**

1.	`theaters`:
* id (Primary Key)
* name (String)
* location (String)
* created_at (timestamp)
* updated_at (timestamp)
2.	`movies`:
* id (Primary Key)
* title (String)
* genre (String)
* released_at (Timestamp)
* created_at (Timestamp)
* updated_at (Timestamp)
3.	`sales`:
* id (Primary Key)
* theater_id (Foreign Key to theaters.id)
* movie_id (Foreign Key to movies.id)
* sold_at (Timestamp)
* amount (Integer)
* created_at (Timestamp)
* updated_at (Timestamp)

**Indexes**
* `sales` theater_id references theaters(id) on delete cascade.
* `sales` movie_id references movies(id) on delete cascade.
* `sales` unique index ix_sales_unique_sale on (theater_id, movie_id, sold_at) to prevent duplicate sales entries for the same theater, movie, and date combination.
* `sales` index ix_sales_sold_at on sold_at to improve query performance when filtering by sale date.

Database Dump File

Sample database dump file is provided in the `database/schema` directory.
