<script
          src="https://cdn.tiny.cloud/1/qft0y7nd2fkpbh6iu02sd4mi8drr27xu3vdx2zvpjl2tjbxj/tinymce/5/tinymce.min.js"
          referrerpolicy="origin"
        ></script>
        <link rel="stylesheet" href="<?php echo $link_sever ?>/public/css/edit_course.css" />
        <!-- footer -->
        <div class="sales-boxes">
          <div class="recent-sales box" style="width: 100%; display: block">
            <div class="title">Chỉnh sửa khóa học</div>

            <form
              class="new-couse"
              method="post"
              action="course_add.php"
              enctype="multipart/form-data"
            >
              <label for="">Tên của khóa học</label>
              <input
                name="name_course"
                type="text"
                placeholder="Nhập tên của khóa học"
                onchange="changeTitle(event)"
              />
              <br />
              <label for="">Giá của khóa học</label>
              <input
                name="price"
                type="number"
                placeholder="Nhập giá của khóa học"
                onchange="ChangePrice(event)"
              />
              <br />
              <label for="">Ảnh mô tả</label>
              <input
                name="image_course"
                style="border: none"
                type="file"
                onchange="loadFile(event)"
              />
              <br />
              <textarea name="description" id="myTextarea"></textarea>
              <button id="btn">Chỉnh sửa khóa học</button>
            </form>
          </div>
        </div>
        <!-- Chỉnh sửa khóa học -->

        <!-- Thêm bài học -->
        <div class="sales-boxes" style="margin-top: 25px">
          <div class="recent-sales box" style="width: 100%; display: block">
            <div class="title">Tạo bài học mới</div>
            <div class="sales-details">
              <form id="edit-lesson" method="POST" action="#" class="new-couse">
                <input type="hidden" id="id_lesson">
                <label style="width: 100%" for="">Tên bài học:</label>
                <input
                  name="name_lesson"
                  type="text"
                  placeholder="Nhập tên của khóa học"
                  onchange="changeTitleLesson(event)"
                />
                <br />
                <label for="">Link của bài học</label>
                <input
                  id="link-lesson"
                  type="text"
                  name="link"
                  placeholder="Nhập link bài học"
                  onchange="changeLink()"
                />
                <br />
                <label style="display: inline-block; width: 100px" for=""
                  >Thể loại link</label
                >
                <select onchange="changeTypeLink(event)" name="typeLink" id="">
                  <option value="1">You Tube</option>
                  <option value="2">Drive</option>
                  <option value="3">Link trực tiếp</option>
                </select>
                <br />
                <label style="width: 100%" for="">Mô tả</label>
                <br />
                <textarea
                  name="description-lesson"
                  id="myTextareaLesson"
                ></textarea>
                <button class="btnCreate">Thêm bài học mới</button>
                <button
                  type="button"
                  id="btnShowPreview"
                  class="btnCreate"
                  onclick="ShowPreviewLesson(event)"
                >
                  Xem bản demo
                </button>
              </form>
            </div>
          </div>
        </div>
        <!-- Thêm bài học -->

        <!-- Xem trực tiếp bài học -->
        <div id="previewLesson" class="sales-boxes" style="margin-top: 25px">
          <div class="recent-sales box" style="width: 100%; display: block">
            <div class="title">Xem trước bài học</div>
            <div class="sales-details" style="display: block">
              <div class="video-preview">
                <iframe
                  id="video-lesson-preview"
                  height="420"
                  src="https://www.youtube.com/embed/X57xjcih8Hk"
                ></iframe>
              </div>
              <h3 id="title-lesson-preview">
                Bài học về tính chủ động trong kinh doanh
              </h3>
              <h4>Bình luận</h4>
              <div id="description-lesson-preview"></div>
            </div>
          </div>
        </div>
        <!-- Xem trực tiếp bài học -->

        <!-- Xem trước khóa học -->
        <div class="sales-boxes" style="margin-top: 25px">
          <div class="recent-sales box" style="width: 100%; display: block">
            <div class="title">Xem trước khóa học mới</div>
            <div class="content">
              <div class="img-pre">
                <img
                  id="img-preview"
                  src="https://image.thanhnien.vn/w1024/Uploaded/2022/xdrkxrvekx/2021_10_12/picture1-3031.png"
                  alt=""
                />
              </div>
              <br />
              <div class="cart-details">
                <h2 id="title-course">Tên khóa học:</h2>
                <p id="number-course">
                  <i class="bx bxs-videos"></i>
                  Số lượng bài học: 10 Bài
                </p>

                <p id="author-course">
                  <i class="bx bxs-user"></i>
                  Tác giả: Bé Công
                </p>

                <p id="price-course">
                  <i class="bx bxs-credit-card"></i>
                  Giá thành: 000 VND
                </p>
              </div>
            </div>
            <br />
            <div class="title">Mô tả khóa học</div>
            <br />
            <div id="description-preview"></div>
          </div>
        </div>
        <script src="<?php echo $link_sever ?>/public/javascript/create_course.js"></script>
        <script src="<?php echo $link_sever ?>/public/javascript/edit_course.js"></script>