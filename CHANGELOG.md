# Changelog

All notable changes to `laravel-nepali-date` will be documented in this file.

## [1.0.1] - 2026-01-22

### Fixed
- Fixed date conversion calculation logic in convertToNepali method
- Corrected diffInDays parameter order for proper date difference calculation
- Fixed issue where all dates were returning reference date (2000-01-01 BS)
- Improved handling of dates after reference point

## [1.0.0] - 2024-12-01

### Added
- Initial release
- English to Nepali date conversion
- Support for years 2000-2100 BS (1943-2043 AD)
- Multiple date format options
- Nepali and English numerals support
- Localized month and day names
- Asia/Kathmandu timezone support
- Laravel Facade integration
- Helper functions (toNepaliDate, nepaliToday, nepaliDateArray)
- Comprehensive error handling
- PHP 8.0+ and Laravel 9-12 support

### Features
- Accurate Bikram Sambat calendar conversion
- Flexible date formatting
- Full localization support
- Modern PHP with strict typing
- Laravel service provider auto-discovery