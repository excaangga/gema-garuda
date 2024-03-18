# GemaGaruda v0.1
## DESCRIPTION
An application to implement ideas based on GovConnect, where the people and the government can work together to get better collaboration and transparent governmental processes (plus It's inspired from an idea on the precidential debate). I use Laravel as the API endpoint and Java as the frontend (Android APK).
## RELEASE NOTE v0.1
- Added full auth capabilities using JWT.
- Added user category with 6 classes, also this acts as RBAC for the govt entity (e.g. Pemkot/Pemkab).
- Added all social media capabilities except messaging person-to-person:
    - Post w/ image and text content
    - Follow others
    - Like the posts
    - Comment and its reply
- Added tag to post (**to be improved later**) so govt entity can make posts like "INFORMASI" or "PENGUMUMAN".
## TODO
### BUG FIXING
- Fix the registration api (default = person), by making the registration step to use the default category, but later on can be changed via update user detail (use superAdminCode for verification).
### ADDITIONAL FEATURES
- Add details to the user record (region/*alamat* desa, kabupaten, dst) so the Laporan functionality can be more credible.
- Make the Laporan data instances to be shown to public in the same area **anonymously** by censoring their uploaders' names, but still can be seen by the govt entity in the same area (filtered by the 'category' and 'region' field in the user table).
- Improve the tagging system on the post, restrict to only non-personal account (only govt) that can only use this feature.