
    <style>
        .custom-modal .modal-content {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            border: none;
        }
        
        .btn-close {
            filter: brightness(0) invert(1);
            opacity: 0.8;
        }
        
        .btn-close:hover {
            opacity: 1;
        }
        
        .photo-container {
            position: relative;
            margin-bottom: 1rem;
        }
        
        .photo-placeholder {
            width: 100%;
            height: 100%;
            border-radius: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border: 3px solid #f8f9fa;
            position: relative;
            overflow: hidden;
        }
        
        .photo-placeholder::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            border-radius: 12px;
        }
        
        .photo-placeholder i {
            position: relative;
            z-index: 1;
        }
        
        .info-section {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.2rem;
            margin-bottom: 1.2rem;
        }
        
        .info-row {
            display: flex;
            align-items: center;
            margin-bottom: 0.4rem;
            padding: 0.2rem 0;
        }
        
        .info-row:last-child {
            margin-bottom: 0;
        }
        
        .info-label {
            font-weight: 600;
            color: #495057;
            min-width: 85px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .info-value {
            color: #212529;
            flex: 1;
        }
        
        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.7rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #dee2e6, transparent);
            margin: 1rem 0;
        }
        
        .modal-footer {
            border-top: none;
            padding: 1.2rem 1.5rem;
            background: #f8f9fa;
            border-radius: 0 0 15px 15px;
        }
        
        .btn-edit-details {
            border: none;
            font-weight: 600;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .btn-edit-details:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        
        .modal-body {
            padding: 1.5rem;
        }
        
        @media (max-width: 768px) {
            .modal-dialog {
                margin: 1rem;
            }
            
            .photo-placeholder {
                height: 120px;
                font-size: 2rem;
            }
            
            .info-label {
                min-width: 100px;
                font-size: 0.9rem;
            }
            
            .modal-body {
                padding: 1.2rem;
            }
        }

    </style>

    <!-- Improved Modal -->
    <div class="modal fade custom-modal" id="viewModal" tabindex="-1" aria-labelledby="viewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Enhanced Header -->
                <div class="modal-header bg-gradient-primary">
                    <h5 class="modal-title text-dark" id="viewLabel">
                        <span id="modalid" hidden></span>
                        Assessor Information
                    </h5>
                    <button type="button" class="btn-close" data-bs-toggle="tooltip" title="Close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <!-- Enhanced Body -->
            
                <div class="modal-body" style="background: #f8f9fa;">
                    <div class="container-fluid">
                        <!-- Photo and Basic Info Section -->
                        <div class="row">
                            <!-- Photo -->
                            <div class="col-md-4 d-flex flex-column align-items-center">
                                <div class="photo-container">
                                    <div class="photo-placeholder">
                                        <span id="modalPhoto">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Basic Information -->
                            <div class="col-md-8">
                                <div class="info-section card shadow-sm border-0 rounded-2 p-4">
                                    <div class="section-title border-bottom pb-2 mb-3 text-primary fw-bold">
                                        Personal Details
                                    </div>

                                    <div class="info-row row bg-light mb-2">
                                        <div class="col-sm-4 fw-semibold text-muted">Name</div>
                                        <div class="col-sm-8" id="modalName"></div>
                                    </div>

                                    <div class="info-row row mb-2">
                                        <div class="col-sm-4 fw-semibold text-muted">Gender</div>
                                        <div class="col-sm-8" id="modalGender"></div>
                                    </div>

                                    <div class="info-row row bg-light mb-2">
                                        <div class="col-sm-4 fw-semibold text-muted">Telephone</div>
                                        <div class="col-sm-8" id="modalTelephone"></div>
                                    </div>

                                    <div class="info-row row mb-2">
                                        <div class="col-sm-4 fw-semibold text-muted">Fax</div>
                                        <div class="col-sm-8" id="modalFax"></div>
                                    </div>

                                    <div class="info-row row bg-light">
                                        <div class="col-sm-4 fw-semibold text-muted">Email</div>
                                        <div class="col-sm-8" id="modalEmail"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Professional Information Section -->
                        <div class="info-section card shadow-sm border-0 rounded-2 p-4">
                            <div class="section-title border-bottom pb-2 mb-3 text-primary fw-bold">
                                Professional Information
                            </div>
                        
                            <div class="info-row bg-light mb-2">
                                <div class="info-label fw-semibold text-muted">
                                    APP Type:&nbsp;
                                </div>
                                <div class="info-value" id="modalType"></div>
                            </div>
                            <div class="info-row row mb-2">
                                <div class="info-label fw-semibold text-muted">
                                    Service Address:&nbsp;
                                </div>
                                <div class="info-value" id="modalAddress"></div>
                            </div>
                            <div class="info-row bg-light mb-2">
                                <div class="info-label fw-semibold text-muted">
                                    Institute:&nbsp;
                                </div>
                                <div class="info-value" id="modalInst"></div>
                            </div>
                            <div class="info-row row mb-2">
                                <div class="info-label fw-semibold text-muted">
                                    Expertise:
                                </div>
                                <div class="info-value" id="modalExpertise"></div>
                            </div>
                            
                            <div class="info-row bg-light mb-2">
                                <div class="info-label fw-semibold text-muted">
                                    NEC Field:
                                </div>
                                <div class="info-value" id="modalNEC"></div>
                            </div>
                            
                            <div class="info-row row mb-2">
                                <div class="info-label fw-semibold text-muted">
                                    CV:
                                </div>
                                <div class="info-value" id="modalCV">
                                    <a href="#" class="text-decoration-none">
                                        <i class="fas fa-download me-1"></i>
                                        Download CV
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

