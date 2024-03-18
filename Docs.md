### Authentication

#### Register
- **Endpoint**: `/register`
- **Method**: `POST`
- **Description**: Registers a new user.
- **Parameters**:
 - `name` (required): The name of the user.
 - `email` (required): The email of the user.
 - `password` (required): The password of the user.
 - `c_password` (required): Confirmation of the password.
 - `nickname` (required): The nickname of the user.
 - `id_category` (required): The category ID of the user.
- **Response**:
 - On success: Returns the registered user data.
 - On failure: Returns an error message.

#### Login
- **Endpoint**: `/login`
- **Method**: `POST`
- **Description**: Logs in a user.
- **Parameters**:
 - `email` (required): The email of the user.
 - `password` (required): The password of the user.
- **Response**:
 - On success: Returns an access token and a refresh token.
 - On failure: Returns an error message.

#### Refresh Token
- **Endpoint**: `/refreshToken`
- **Method**: `POST`
- **Description**: Refreshes the access token.
- **Parameters**: None.
- **Response**:
 - On success: Returns a new access token.
 - On failure: Returns an error message.

### User Management

#### List Users
- **Endpoint**: `/users`
- **Method**: `GET`
- **Description**: Retrieves a list of users.
- **Parameters**: None.
- **Response**:
 - On success: Returns a list of users.
 - On failure: Returns an error message.

#### Show User
- **Endpoint**: `/users/{user}`
- **Method**: `GET`
- **Description**: Retrieves a specific user.
- **Parameters**:
 - `user` (required): The ID of the user.
- **Response**:
 - On success: Returns the user data.
 - On failure: Returns an error message.

#### Update User
- **Endpoint**: `/users/{user}`
- **Method**: `PUT`
- **Description**: Updates a specific user.
- **Parameters**:
 - `user` (required): The ID of the user.
 - `name` (optional): The new name of the user.
 - `nickname` (optional): The new nickname of the user.
 - `photo_url` (optional): The new photo URL of the user.
 - `description` (optional): The new description of the user.
- **Response**:
 - On success: Returns the updated user data.
 - On failure: Returns an error message.

#### Delete User
- **Endpoint**: `/users/{user}`
- **Method**: `DELETE`
- **Description**: Deletes a specific user.
- **Parameters**:
 - `user` (required): The ID of the user.
- **Response**:
 - On success: Returns a success message.
 - On failure: Returns an error message.

### Post Management

#### List Posts
- **Endpoint**: `/post`
- **Method**: `GET`
- **Description**: Retrieves a list of posts.
- **Parameters**: None.
- **Response**:
 - On success: Returns a list of posts.
 - On failure: Returns an error message.

#### Show Post
- **Endpoint**: `/post/{post}`
- **Method**: `GET`
- **Description**: Retrieves a specific post.
- **Parameters**:
 - `post` (required): The ID of the post.
- **Response**:
 - On success: Returns the post data.
 - On failure: Returns an error message.

#### Create Post
- **Endpoint**: `/post`
- **Method**: `POST`
- **Description**: Creates a new post.
- **Parameters**:
 - `tag` (optional): The tag of the post.
 - `content_text` (required): The text content of the post.
 - `content_image_link` (optional): The image link of the post.
- **Response**:
 - On success: Returns the created post data.
 - On failure: Returns an error message.

#### Update Post
- **Endpoint**: `/post/{post}`
- **Method**: `PUT`
- **Description**: Updates a specific post.
- **Parameters**:
 - `post` (required): The ID of the post.
 - `tag` (optional): The new tag of the post.
 - `content_text` (optional): The new text content of the post.
 - `content_image_link` (optional): The new image link of the post.
- **Response**:
 - On success: Returns the updated post data.
 - On failure: Returns an error message.

#### Delete Post
- **Endpoint**: `/post/{post}`
- **Method**: `DELETE`
- **Description**: Deletes a specific post.
- **Parameters**:
 - `post` (required): The ID of the post.
- **Response**:
 - On success: Returns a success message.
 - On failure: Returns an error message.

### Comment Management

#### Make Comment
- **Endpoint**: `/comment/{post}`
- **Method**: `POST`
- **Description**: Creates a new comment on a post.
- **Parameters**:
 - `post` (required): The ID of the post.
 - `comment` (required): The comment text.
- **Response**:
 - On success: Returns the created comment data.
 - On failure: Returns an error message.

#### List Comments
- **Endpoint**: `/listComments/{post}`
- **Method**: `POST`
- **Description**: Retrieves a list of comments on a post.
- **Parameters**:
 - `post` (required): The ID of the post.
- **Response**:
 - On success: Returns a list of comments.
 - On failure: Returns an error message.

#### Delete Comment
- **Endpoint**: `/comment/{comment}`
- **Method**: `DELETE`
- **Description**: Deletes a specific comment.
- **Parameters**:
 - `comment` (required): The ID of the comment.
- **Response**:
 - On success: Returns a success message.
 - On failure: Returns an error message.

### Reply Management

#### Make Reply
- **Endpoint**: `/reply/{comment}`
- **Method**: `POST`
- **Description**: Creates a new reply to a comment.
- **Parameters**:
 - `comment` (required): The ID of the comment.
 - `reply` (required): The reply text.
- **Response**:
 - On success: Returns the created reply data.
 - On failure: Returns an error message.

#### List Replies
- **Endpoint**: `/listReplies/{comment}`
- **Method**: `POST`
- **Description**: Retrieves a list of replies to a comment.
- **Parameters**:
 - `comment` (required): The ID of the comment.
- **Response**:
 - On success: Returns a list of replies.
 - On failure: Returns an error message.

#### Delete Reply
- **Endpoint**: `/reply/{reply}`
- **Method**: `DELETE`
- **Description**: Deletes a specific reply.
- **Parameters**:
 - `reply` (required): The ID of the reply.
- **Response**:
 - On success: Returns a success message.
 - On failure: Returns an error message.

### Like Management

#### Like Post
- **Endpoint**: `/like/{post}`
- **Method**: `POST`
- **Description**: Likes a post.
- **Parameters**:
 - `post` (required): The ID of the post.
- **Response**:
 - On success: Returns the created like data.
 - On failure: Returns an error message.

#### Unlike Post
- **Endpoint**: `/unlike/{post}`
- **Method**: `POST`
- **Description**: Unlikes a post.
- **Parameters**:
 - `post` (required): The ID of the post.
- **Response**:
 - On success: Returns a success message.
 - On failure: Returns an error message.

#### List Likes
- **Endpoint**: `/listLikes/{post}`
- **Method**: `POST`
- **Description**: Retrieves a list of likes on a post.
- **Parameters**:
 - `post` (required): The ID of the post.
- **Response**:
 - On success: Returns a list of likes.
 - On failure: Returns an error message.

### Follow Management

#### Follow User
- **Endpoint**: `/follow/{user}`
- **Method**: `POST`
- **Description**: Follows a user.
- **Parameters**:
 - `user` (required): The ID of the user.
- **Response**:
 - On success: Returns the created follow data.
 - On failure: Returns an error message.

#### Unfollow User
- **Endpoint**: `/unfollow/{user}`
- **Method**: `POST`
- **Description**: Unfollows a user.
- **Parameters**:
 - `user` (required): The ID of the user.
- **Response**:
 - On success: Returns a success message.
 - On failure: Returns an error message.

#### List Followers
- **Endpoint**: `/listFollowers/{user}`
- **Method**: `POST`
- **Description**: Retrieves a list of followers of a user.
- **Parameters**:
 - `user` (required): The ID of the user.
- **Response**:
 - On success: Returns a list of followers.
 - On failure: Returns an error message.