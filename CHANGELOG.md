# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0] - 2026-04-07

### Breaking Changes
- **Dropped PHP 7.4 support** — minimum version is now PHP 8.0.
- **`ClientBuilder` constructor** — `$requestAdapter` parameter is now required (was optional/nullable).
- **Builder return types** — all builder methods now return `static` instead of `self`, improving fluent interface support for subclasses.

### Added
- MIT License.
- `setSnrsParams()` available on all event builders (moved from `AbstractCartBuilder` to `AbstractBaseBuilder`).
- PHPStan level 9 (maximum) static analysis.
- PHP-CS-Fixer with @PER-CS2.0 coding standard.
- PHPMD for complexity and coupling analysis.
- PHPCompatibility checks for PHP 8.0+.
- `declare(strict_types=1)` across all source and test files.
- Comprehensive test suite (306 tests, 524 assertions).
- Token caching with PSR-6 (`PsrItemPoolTokenCache`) and PSR-16 (`PsrTokenCache`) support.

### Fixed
- `WorkspaceAccessTokenProvider::getAuthorizationTokenAsync()` now correctly returns token string instead of `TokenResponse` object.
- `BirthDateValidator` no longer uses string key in integer-keyed error array.
- `ClientFactory::prepareHeaders()` returns correct `keep-alive` header as string instead of wrapped array.
- Null safety improvements across all builders, validators, and cache implementations.
- `CookieProfileFactory::getExtraParams()` uses `json_decode` with `is_array` guard instead of Kiota parse node.
- `Profile` extraParams deserialization handles non-array JSON gracefully.

### Changed
- Updated PHPStan baseline — removed stale ignore rules resolved by `static` return types.
- Validators use `instanceof` instead of `is_a()` for type-safe checks.
- `UnitPriceValidator::validate()` now safely handles non-object input.
- `EventBaseValidator::ISO8601()` accepts nullable string.

## [0.7.2] and earlier

See [git history](https://github.com/Synerise/php-sdk/commits/master) for previous changes.