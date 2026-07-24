<div align="center">

# REKABE

### Secure Educational Video Delivery

![Flutter](https://img.shields.io/badge/Flutter-02569B?style=for-the-badge&logo=flutter&logoColor=white)
![Cubit](https://img.shields.io/badge/BLoC%20%2F%20Cubit-0D1117?style=for-the-badge&logo=flutter&logoColor=54C5F8)
![Video](https://img.shields.io/badge/Secure_Video-0D1117?style=for-the-badge&logo=youtube&logoColor=54C5F8)
![Security](https://img.shields.io/badge/Session_%26_Device_Protection-02569B?style=for-the-badge&logo=shield&logoColor=white)

</div>

## Executive Summary

REKABE is a premium educational-content application focused on protecting paid video access while keeping the learner experience fast and straightforward. The central engineering problem was balancing playback usability with controls that reduce casual account sharing, unauthorized access, and untraceable screen capture.

The mobile implementation organizes playback, authentication state, device/session restrictions, and visible content ownership indicators outside the presentation layer so security rules remain consistent across screens.

## Architecture Visualizer

```text
Flutter Learning UI
         ↓
Cubit / Playback State
         ↓
Authentication & Access Rules
      ↙          ↓           ↘
Device Binding  Session Guard  Dynamic Watermark
         ↓
Protected Video Playback + Remote APIs
```

## Key Engineering Scope

- Authenticated access to premium educational content.
- Single-session and account-sharing controls.
- Device-binding rules for protected access.
- Dynamic moving ownership text over video content.
- Playback-state management and resilient media handling.
- Application restart/recovery behavior for critical session changes.
- Separation of security rules from individual UI screens.

## Performance & Security Milestones

- Centralized session and device checks to avoid inconsistent access decisions.
- Dynamic ownership overlays designed to discourage anonymous redistribution.
- Playback lifecycle handling isolated from general application navigation.
- Recovery flows designed to restore a known application state after sensitive account changes.
- Security controls layered around the product experience instead of relying on a single client-side flag.

> A public audited security score or verified runtime percentage is not available. This case study intentionally describes implemented controls without presenting unsupported numerical claims.

## Repository Status

REKABE is a private commercial application. Source code, video infrastructure, credentials, and client-specific security configuration are not public.

## Role

**Mohammed Al-Sharjabi** — Flutter development, application refactoring, playback architecture, session/device protection, state management, and production feature delivery.
