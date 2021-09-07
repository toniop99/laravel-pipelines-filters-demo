# Filter with Pipelines - DEMO
## Setup
- composer install
- npm install
- Run migrations (php artisan migrate)
- Run seeders (php artisan db:seed)
## Info
- `\App\QueryFilters\`
  - Here we find all the filters that can be applied.
  - **`Filter class`** contains a method `applyFilters` to execute the pipeline.
    - `$query` : A builder instance to realize de filters.
    - `$filters` : An array of desired filter classes to apply on this query.
    - `$pagination` : For paginate or not the query.
