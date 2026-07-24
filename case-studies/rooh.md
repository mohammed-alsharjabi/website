<div align="center">

# Rooh | رُوح · طمأنينة

### Arabic-First Islamic Companion Application

![Flutter](https://img.shields.io/badge/Flutter-02569B?style=for-the-badge&logo=flutter&logoColor=white)
![Cubit](https://img.shields.io/badge/BLoC%20%2F%20Cubit-0D1117?style=for-the-badge&logo=flutter&logoColor=54C5F8)
![Hive](https://img.shields.io/badge/Hive-FFC107?style=for-the-badge&logo=dart&logoColor=0D1117)
![Audio](https://img.shields.io/badge/Background_Audio-0D1117?style=for-the-badge&logo=musicbrainz&logoColor=54C5F8)
![RTL](https://img.shields.io/badge/Arabic_RTL-02569B?style=for-the-badge&logo=googletranslate&logoColor=white)

</div>

## Executive Summary

Rooh is an Arabic-first spiritual companion that brings Quran reading and listening, daily adhkar, prayer utilities, reminders, Hijri tools, tasbeeh, and background audio into one focused mobile experience.

The technical challenge was not only the number of features. The application also had to remain usable when location, notifications, timezone resolution, or audio initialization became slow or unavailable. Its architecture separates critical startup work from optional native services so one failing integration does not block the entire product.

## Architecture Visualizer

```text
Flutter Screens & Widgets
          ↓
Feature Cubits / Logic
          ↓
Repositories & Services
      ↙       ↓        ↘
Local JSON   Hive     Dio / MP3Quran
          ↓
Native Audio · Notifications · Location · Timezone
```

## Key Features

- Quran reading and Quran audio playback.
- Reciter and surah audio delivery through MP3Quran API v3.
- Background playback with persistent now-playing controls.
- Daily adhkar and structured local Islamic content.
- Prayer times calculated from device location.
- Scheduled local notifications and adhan alerts.
- Hijri date, tasbeeh, and prayer tools.
- Arabic-first RTL design and local preference persistence.

## Performance & Reliability

- Critical storage initialization is separated from deferred services.
- Audio startup is isolated so playback failures do not crash or block the UI.
- Timeouts protect application launch from slow native integrations.
- Android and iOS notification startup are handled independently.
- Local JSON and Hive/GetStorage reduce unnecessary network dependency.
- The app remains usable when optional background services fail.

## Architecture Notes

Rooh follows a feature-first structure with dedicated areas for Quran, audio, adhkar, prayer tools, onboarding, home, settings, and notifications. State is managed through BLoC/Cubit, while native-service integrations are kept outside screen widgets.

## Repository Status

The active product repository is private. This public case study documents the product scope and verified engineering decisions without exposing application assets, credentials, private content data, or unpublished product code.

## Role

**Mohammed Al-Sharjabi** — Product architecture, Flutter development, native-service integration, audio architecture, notification scheduling, local persistence, API integration, and Arabic UX.
