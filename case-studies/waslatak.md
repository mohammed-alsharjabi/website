<div align="center">

# Waslatak | وصلتك

### Smart Grocery Delivery for Riyadh

![Flutter](https://img.shields.io/badge/Flutter-02569B?style=for-the-badge&logo=flutter&logoColor=white)
![BLoC](https://img.shields.io/badge/BLoC%20%2F%20Cubit-0D1117?style=for-the-badge&logo=flutter&logoColor=54C5F8)
![Laravel](https://img.shields.io/badge/Laravel_API-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Maps](https://img.shields.io/badge/Google_Maps-4285F4?style=for-the-badge&logo=googlemaps&logoColor=white)

</div>

## Executive Summary

Waslatak is a grocery-delivery mobile product designed around the Riyadh market. The engineering challenge was to connect product discovery, cart and ordering behavior, delivery location, API communication, and unstable mobile-network conditions into one maintainable customer experience.

The implementation combines Flutter and BLoC-based state management with Laravel REST APIs, MySQL-backed business data, Google Maps services, and local caching for a more resilient mobile flow.

## Architecture Visualizer

```text
Flutter UI
    ↓
BLoC / Cubit State
    ↓
Repositories
    ↓
Dio + Local Cache
    ↓
Laravel REST API
    ↓
MySQL + Google Maps Services
```

## Key Engineering Scope

- Authentication and customer session flows.
- Store, category, and product discovery.
- Cart and checkout state management.
- Customer-location selection and delivery positioning.
- REST API integration through explicit repository boundaries.
- Offline and cached state for selected customer data.
- Arabic-first responsive mobile experience.

## Performance & Reliability

- Reduced unnecessary network dependency through cached application state.
- Isolated location behavior from screen widgets for easier maintenance and testing.
- Designed state flows for loading, success, empty, error, and permission conditions.
- Structured networking so retries, errors, and authentication behavior can be handled centrally.

> No public benchmark or audited percentage improvement is published for this private commercial codebase. The case study therefore documents verified engineering scope without presenting unsupported numerical claims.

## Repository Status

The production source code is private to protect commercial and client-owned implementation details. Architecture and delivery information is shared here for technical review without exposing proprietary code or credentials.

## Role

**Mohammed Al-Sharjabi** — Mobile architecture, Flutter development, state management, API integration, location services, performance work, and feature delivery.
