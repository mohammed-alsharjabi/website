<div align="center">

# GROW

### Multi-Store Grocery Delivery Application

![Flutter](https://img.shields.io/badge/Flutter-02569B?style=for-the-badge&logo=flutter&logoColor=white)
![Cubit](https://img.shields.io/badge/BLoC%20%2F%20Cubit-0D1117?style=for-the-badge&logo=flutter&logoColor=54C5F8)
![Dio](https://img.shields.io/badge/Dio-REST-02569B?style=for-the-badge&logo=dart&logoColor=white)
![GetIt](https://img.shields.io/badge/GetIt-DI-0D1117?style=for-the-badge&logo=dart&logoColor=54C5F8)
![GoRouter](https://img.shields.io/badge/GoRouter-02569B?style=for-the-badge&logo=flutter&logoColor=white)

</div>

## Executive Summary

GROW is a commercial multi-store grocery-delivery application covering the customer journey from authentication and discovery through cart, coupons, checkout, order creation, and order history.

The engineering work focused on turning a large feature set into a more maintainable Flutter structure: centralized dependencies, shared networking, explicit repositories, reusable loading states, and business features separated from application bootstrap code.

## Architecture Visualizer

```text
Flutter Screens & Widgets
          ↓
BLoC / Cubit Logic
          ↓
Feature Repositories
      ↙          ↘
Shared Cache    Central Dio Client
          ↓
Remote Grocery & Ordering APIs
```

## Key Features

- Authentication, signup, OTP verification, and password recovery.
- Nearby store, category, and product discovery.
- Product details, popular products, search, and filtering.
- Persistent cart and coupon application.
- Checkout, order creation, order history, and order details.
- Cached images, shimmer loading, animations, and reusable states.
- Centralized dependency injection and shared networking client.

## Performance & Reliability

- Reduced `main.dart` to application bootstrap responsibilities.
- Moved global providers and application composition into `app.dart`.
- Reused a single Dio client across repositories instead of creating network clients per feature.
- Awaited local-storage initialization before application launch.
- Removed repository-owned networking behavior from product-detail presentation flows.
- Preserved legacy directory names where changing imports would create delivery risk, while documenting the required future migration.

## Architecture Notes

The codebase uses a feature-first structure. Authentication, cart, categories, checkout, home, orders, product details, search, and stores own their UI, logic, models, and repository responsibilities, while shared infrastructure remains under `core`.

## Repository Status

The customer application repository is private because its backend configuration and commercial implementation are maintained separately. This case study documents verified engineering scope without publishing client-owned code.

## Role

**Mohammed Al-Sharjabi** — Flutter development, refactoring, API integration, state management, dependency injection, networking architecture, and production feature delivery.
